<?php namespace App\Http\Controllers;

use App;
use Route;
use View;
use Request;
use App\Models;
use App\Models\SocialBuzz;
use App\Models\LogFacebookFeed;
use App\Models\LogTwitterFeed;
use App\Models\LogInstagramFeed;
use App\Libraries;
use App\Libraries\ResponseHelper;
use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;


Class SocialController extends Controller {

	public function getSocialBuzzFeed(){ 

		$page = Request::input("page", 1); 
		$pageSize = Request::input("page_size", 20);
		$filter = Request::input("filter", 'all');
		
		try{
			if(!preg_match('/^\d+$/', $page)){ $page = 1; }
			if(!preg_match('/^\d+$/', $pageSize)){ $pageSize = 20; }	
		}catch(\Exception $ex){
			$page = 1;
			$pageSize = 20;

			$inputs = \Request::all();
			$inputs['page'] = 1;
			\Request::replace($inputs);
		}

		switch($filter){
			case 'facebook':
			case 'twitter':
			case 'instagram':
				$feeds = SocialBuzz::where('platform', $filter)->orderBy('posted_at', 'desc')->paginate($pageSize); //dd($feeds);
				break;

			default:			
				$feeds = SocialBuzz::orderBy('posted_at', 'desc')->paginate($pageSize);
				
		}
		
		return ResponseHelper::OutputJSON('success', '', [
			'feeds' => $feeds->toArray()
		]);	
	}

	public function cronCrawlForSocialBuzz(){
		$this->readPageFeedFacebook();
		$this->readPageFeedTwitter();
		$this->readPageFeedInstagram();

		$this->updateSocialBuzzFeed();

	}

	public function updateSocialBuzzFeed(){
		$crawlRecentDay = 10;
		$sql = "
			INSERT INTO `t0201_socialbuzz` ( `platform`, `feed_id`, `type`, `message`, `picture`, `post_link`, `posted_at`) 
				SELECT 'facebook', `feed_id`, 'text', `message`, '', '', `posted_at` 
					FROM `t9431_log_facebook_feed` 
						WHERE `posted_at`> DATE_SUB(NOW(), INTERVAL {$crawlRecentDay} DAY)

				UNION ALL 

				SELECT 'twitter', `feed_id`, 'text', `message`, '', '', `posted_at` 
					FROM `t9432_log_twitter_feed` 
						WHERE `posted_at`> DATE_SUB(NOW(), INTERVAL {$crawlRecentDay} DAY)

				UNION ALL 

				SELECT 'instagram', `feed_id`, 'photo', `message`, `picture` , `post_link`, `posted_at` 
					FROM `t9433_log_instagram_feed` 
						WHERE `posted_at`> DATE_SUB(NOW(), INTERVAL {$crawlRecentDay} DAY)
				
				ORDER BY `posted_at` DESC
			ON DUPLICATE KEY UPDATE 
				`updated_at` = NOW();
		";

        $result = \DB::insert($sql);

		return ResponseHelper::OutputJSON('success');	
	}

	public function readPageFeedFacebook() {

		$client = new Client([
			'base_url' => ['https://graph.facebook.com/{version}/', ['version' => 'v2.3']],
			'defaults' => [
				'query'   => ['access_token' => \Config::get('app.facebook_app_access_token')],
				'verify' => false
			]
		]);	

		try {
			$response = $client->get(\Config::get('app.facebook_official_page_id')."/feed");
		} catch (RequestException $e) {
		    echo $e->getRequest() . "\n";
		    if ($e->hasResponse()) {
		        echo $e->getResponse() . "\n";
		    }
		}

		$feeds = $response->json();

		for($i=0; $i<count($feeds['data']); $i++){
			$feed = $feeds['data'][$i];
			
			$picture = '';
			switch ($feed['type']) {
				case 'photo':
					$response = $client->get($feed['object_id']);
					$response = $response->json(); 
					$picture = $response['images'][0]['source'];
					break;
				default: break;
			}

			if(!isset($feed['message'])){
				continue;
			}

			$log = new LogFacebookFeed;
			$log->feed_id = $feed['id'];
			$log->type = $feed['type'];
			$log->status_type = $feed['status_type'];
			$log->message = $feed['message'];
			$log->picture = $picture;
			$log->posted_at = $feed['created_time'];
							
			try { $log->save(); } catch (\Exception $e) {}
		}

	}

	public function readPageFeedTwitter() {
	
		$client = new Client([
			'base_url' => ['https://api.twitter.com/{version}/', ['version' => '1.1']],
			'defaults' => [
				'verify' => false
			]
		]);	

		$oauth = new Oauth1([
		    'consumer_key'    => \Config::get('app.twitter_app_id'),
		    'consumer_secret' => \Config::get('app.twitter_app_secret'),
		    'token'           => \Config::get('app.twitter_access_token'),
		    'token_secret'    => \Config::get('app.twitter_access_token_secret')
		]);		

		$client->getEmitter()->attach($oauth);

		try {
			$response = $client->get('statuses/user_timeline.json', [
				'auth' => 'oauth',
				'query' => [
					'screen_name' => \Config::get('app.twitter_official_page_name'),
					'count' => 30,
				],
			]);

		} catch (RequestException $e) {
		    echo $e->getRequest() . "\n";
		    if ($e->hasResponse()) {
		        echo $e->getResponse() . "\n";
		    }
		}

		$feeds = $response->json(); //dd($feeds);

		for($i=0; $i<count($feeds); $i++){
			$feed = $feeds[$i];

			$log = new LogTwitterFeed;
			$log->feed_id = $feed['id_str'];
			$log->message = $feed['text'];
			$log->posted_at = date('Y-m-d H:i:s', strtotime($feed['created_at']));
							
			try { $log->save(); } catch (\Exception $e) {}
		}

	}	

	public function readPageFeedInstagram() {
	
		$client = new Client([
			'base_url' => ['https://api.instagram.com/{version}/', ['version' => 'v1']],
			'defaults' => [
				'query'   => ['client_id' => \Config::get('app.instagram_app_id')],
				'verify' => false
			]
		]);	

		try {
			$response = $client->get('users/'.\Config::get('app.instagram_official_page_id').'/media/recent/'); 

		} catch (RequestException $e) {
		    echo $e->getRequest() . "\n";
		    if ($e->hasResponse()) {
		        echo $e->getResponse() . "\n";
		    }
		}

		$feeds = $response->json(); //dd($feeds['data']);

		for($i=0; $i<count($feeds['data']); $i++){
			$feed = $feeds['data'][$i];

			$log = new LogInstagramFeed;
			$log->feed_id = $feed['id'];
			$log->type = $feed['type'];
			$log->post_link = $feed['link'];
			$log->message = $feed['caption']['text'];
			$log->picture = $feed['images']['standard_resolution']['url'];
			$log->video = (isset($feed['videos']))?$feed['videos']['standard_resolution']['url']:'';
			$log->posted_at = date('Y-m-d H:i:s', $feed['created_time']);
							
			try { $log->save(); } catch (\Exception $e) {}
		}

	}		

}




