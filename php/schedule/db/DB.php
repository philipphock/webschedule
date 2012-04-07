<?php
class DB{
	protected function getDB(){
		return new mysqli('localhost', Config::db_user, Config::db_password, Config::db_db);
	}
	
	
}
