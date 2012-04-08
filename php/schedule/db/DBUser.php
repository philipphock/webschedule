<?php
class DBUser extends DB{
	protected $userTable;
	
	public function __construct(){
		$this->userTable = Config::db_prefix . '_' . 'users';
	}
	public function auth($username,$password){
		$db = $this->getDB();
		
	    $sql = 'SELECT id, user, pw, role FROM ' . $this->userTable . ' WHERE user = ?';
	    
	    $pstmt = $db->prepare( $sql );
	    
		$pstmt->bind_param('s', $username);
		
	    $pstmt->execute();
	    $pstmt->bind_result( $id, $usr, $pw, $role );
	    
	    $pstmt->fetch();
		
		
		
		if ($id != 0){
			$salt = substr($pw, 0, 6);
			$saltedInputPW = md5($salt . $password);
			
			if ($salt . $saltedInputPW == $pw)
				return new User($id,$usr,$role);
		}
		return User::createGuest();
	}
	
}
