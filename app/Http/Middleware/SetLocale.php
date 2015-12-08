<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class SetLocale {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $languages = ['en','ms'];

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

		//check is it our business
		$currentLanguage = explode('/', $request->path())[0];
		if(!in_array($currentLanguage, $this->languages)){
			return $next($request);
		}

		//switch and go!
		$switchLanguage = $request->input('switch-language');
		if($switchLanguage){
			if(in_array($switchLanguage, $this->languages)){
				return \Redirect::to(str_replace($currentLanguage.'/', $switchLanguage.'/', $request->path()));	
			}		
		}

		$request->session()->put('locale', $currentLanguage);
		\App::setLocale($currentLanguage);		

		return $next($request);
		
	}

}
