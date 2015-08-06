<?php namespace App\Http\Controllers;

use App;
use Request;
use App\Models\VideoTrailerEn;
use App\Models\VideoTrailerMs;

use Exception;
use Upload\File;
use Upload\Storage\FileSystem;
use Upload\Validation\Mimetype;
use Upload\Validation\Size;
use App\Libraries\ResponseHelper;

/*
use App;
use Session;
use Config;
use DB;
use App\Models;


 */

Class TrailerImageController extends Controller {

	public function create() {

		$storage = new FileSystem('./assets/images/about/trailer/uploads', true);
		for ($i = 0; $i < 20; $i++) {
			try {
				$file = new File('ep-' . $i, $storage);
				if (!intval($file->getSize())) {
					continue;
				}

				$trailer = VideoTrailerEn::select("url_name")->where('week', $i + 1)->first();
				if (!$trailer) {
					continue;
				}

				$file->setName($trailer->url_name);
				$file->addValidations(array(
					new Mimetype('image/jpeg'),
					new Size('1M'),

				));
				$file->upload();

			} catch (\Exception $ex) {
				// Fail!
				die($ex->getMessage());
				$errors = $file->getErrors();
				return $errors;
				// die('invalid / exceed 2MB image');
			}

		}

		die('success');
		return redirect('/admin/trailer-image');

	}

	public function UpdateVideoTrailer() {

        try {
        	$VideoTrailerArray = Request::input('video_trailer');

        	if(!$VideoTrailerArray){
				return ResponseHelper::OutputJSON('fail', 'missing parameter');
        	}

        	$VideoTrailerArray = json_decode($VideoTrailerArray, true);

        	if(!isset($VideoTrailerArray[0]['language']) ){ 
					return  [
					'status' => "fail",
					'message' => "invalid game result format",
				]; 
			}
			for($i=0; $i<count($VideoTrailerArray); $i++){
				$v = $VideoTrailerArray[$i];

				if($v['language'] == 'en'){
					$videoTrailer = VideoTrailerEn::find($v['id']);

				}elseif($v['language'] == 'ms') {
					$videoTrailer = VideoTrailerMs::find($v['id']);

				}else{
					return ResponseHelper::OutputJSON('fail', 'invalid language');
				}

				$videoTrailer->movideo_id = $v['language'];
				$videoTrailer->url_name = $v['url_name'];
				$videoTrailer->show_time = $v['show_time'];
				$videoTrailer->meta_title = $v['meta_title'];
				$videoTrailer->meta_desc = $v['meta_desc'];
				$videoTrailer->title = $v['title'];
				$videoTrailer->desc = $v['desc'];
				$videoTrailer->share_title = $v['share_title'];
				$videoTrailer->share_desc = $v['share_desc'];
				$videoTrailer->enable = $v['enable'];
	 			$videoTrailer->save();
			}

			return ResponseHelper::OutputJSON('success');	

        } catch (Exception $ex) {
            // Fail!
            die($ex->getMessage());
        }
    }

}
