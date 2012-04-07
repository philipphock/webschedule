<?php
class DBUser extends DB{
	protected $userTable;
	
	public function __construct(){
		$this->userTable = Config::db_prefix . '_' . 'users';
	}
	public function auth($username,$password){
		$db = $this->getDB();
		
	    $sql = 'SELECT id, user, role FROM ' . $this->userTable . ' WHERE user = ? AND pw = ?';
	    
	    $pstmt = $db->prepare( $sql );
	    
		$pstmt->bind_param('ss', $username, $password);
		
	    $pstmt->execute();
	    $pstmt->bind_result( $id, $usr, $role );
	    
	    $pstmt->fetch();
		
		if ($id == 0){
			return User::createGuest();
		}else{
			return new User($id,$usr,$role);
		}
	
	}
	
}
