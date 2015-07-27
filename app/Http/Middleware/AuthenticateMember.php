<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Models;
use Libraries;

class AuthenticateMember {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$isApi = (strpos($request->path(), 'api/') !== FALSE);

		$accessToken = \Request::cookie('access-token');
		$accessToken = (!$accessToken)?\Session::get('access-token'):$accessToken;
		$accessToken = (!$accessToken)?\Request::header('X-access-token'):$accessToken;
		
		if(!$accessToken){
			if($isApi){
				return Libraries\ResponseHelper::OutputJSON('fail', 'missing access token');
			}else{
				return \Redirect::to('/sign-in?missing-access-token');
			}						
		}

		$userAccess = Models\UserAccess::where('access_token', $accessToken)->whereRaw('access_token_expired_at > NOW()')->first();
		if(!$userAccess){
			if($isApi){
				return Libraries\ResponseHelper::OutputJSON('fail', 'invalid access token');
			}else{
				return \Redirect::to('/sign-in?invalid-access-token');				
			}						
		}	

		$user = Models\User::find($userAccess->user_id);
		if(!$user){
			if($isApi){
				return Libraries\ResponseHelper::OutputJSON('fail', 'user not found: '.$userAccess->user_id);
			}else{
				return \Redirect::to('/sign-in?user-not-found');				
			}	
		}		

		$inputs = \Request::all();
		$inputs['user_id'] = $user->id;
		$inputs['user_name'] = $user->name;
		
		\Request::replace($inputs);				

		return $next($request);
	}

}
