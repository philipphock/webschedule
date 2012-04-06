<?php

class Login{
	public static function isLoggedIn(){
		return Login::getUser() != null;	
	}	
		
	public static function getUser(){
		if (!array_key_exists('user',$_SESSION)){
			$_SESSION['user']=null;
		}
		return $_SESSION['user'];	
	}
}
