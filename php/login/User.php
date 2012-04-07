<?php
class User{
	private $name;
	private $role;
	private $id;
	
	const ADMIN = "admin";
	const GUEST = "guest";
	const LOGIN = "login";
	
	public function __construct($id,$name,$role){
		$this->name=$name;
		$this->role=$role;
		$this->id=$id;
	}
	
	public function getName(){
		return $this->name;
	}
	public function getRole(){
		return $this->role;
	}
	public function getId(){
		return $this->id;
	}
	
	public static function createGuest(){
		return new User(0,null,User::GUEST);
	} 
}
