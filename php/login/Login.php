<?php

class Login{
	public static function isLoggedIn(){
		$user = Login::getUser();
		
		return $user->getId() != 0;	
	}	
		
	public static function getUser(){
		if (!array_key_exists('user',$_SESSION) || $_SESSION['user'] == null){
			$_SESSION['user'] = User::createGuest();
		}
		return $_SESSION['user'];	
	}
	
	public static function userlogin($user, $pass){
		$dbu = new DBUser();
		$user = $dbu->auth($user,$pass);
		
		$_SESSION['user'] = $user;
		
	}
	
	public static function logout(){
		$_SESSION['user'] = null;
	}
}
