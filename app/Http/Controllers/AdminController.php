<?php namespace App\Http\Controllers;

use App;
use App\Models;
use App\Models\Week;
use Request;
use DB;
use Exception;
use Session;
use App\Libraries\ResponseHelper;

Class AdminController extends Controller {

	public function signIn(){ 
		try {
			$username = Request::input("username");
			$password = Request::input("password");

			$dbPasswords = [
				['u' => 'admin', 'p' => 'ome888'],
				['u' => 'hgun77', 'p' => '123123'],
			];

			for($i=0; $i<count($dbPasswords); $i++){
				$r = $dbPasswords[$i];
				if($r['u'] == $username && $r['p'] == $password){
					Session::put('admin', $username);
					
					return ResponseHelper::OutputJSON('success');	
				}
			}

			Session::forget('admin');
			return ResponseHelper::OutputJSON('fail');	

		} catch(Exception $ex) {
			return ResponseHelper::OutputJSON('exception');
		}
	}

	public function signOut(){ 
		Session::forget('admin');
		return ResponseHelper::OutputJSON('success');	
	}

	public function weekEnable(){ 
		$weekArray = Request::input('week');

		try {
			if(!$week){
				return ResponseHelper::OutputJSON('fail','missing parameter');	
			}

	        $weekArray = json_decode($weekArray, true);

			for($i=0; $i<count($weekArray); $i++){
				$w = $weekArray[$i];

				$week = Week::where('week', $w['week'])->first();
				$week->enable =  $w['enable'];
				$week->save();
			}
			return ResponseHelper::OutputJSON('success');	
		} catch(Exception $ex) {
			return ResponseHelper::OutputJSON('exception');
		}

	}

}

