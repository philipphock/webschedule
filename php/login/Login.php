<?php

class Login{
	public static function isLoggedIn(){
		return Login::getUser() == true;	
	}	
		
	public static function getUser(){
		if (!array_key_exists('user',$_SESSION)){
			$_SESSION['user']=false;
		}
		return $_SESSION['user'];	
	}
	
	public static function userlogin($user, $pass){
		if ($user == "phil" && $pass == "phil"){
			$_SESSION['user'] = true;
		}
	}
	
	public static function logout(){
		$_SESSION['user'] = false;
	}
}
