<?php
class DBAppointments extends DB{
	
	function __construct(){
		$userid = Login::getUser()->getId();
		if ($userid != 0){
			$this->appointmentTable = Config::db_prefix . '_' . 'appointments_' . $userid;	
		}else{
			$this->appointmentTable = null;
		}
		
	}
	
	public function createAppointment($name, $date, $time, $note){
		$db = $this->getDB();
		
		if (!$this->appointmentTable) return false;
	    $sql = 'INSERT INTO ' . $this->appointmentTable . '(date,time,name,note) VALUES (?,?,?,?)';
	    $pstmt = $db->prepare( $sql );
		$pstmt->bind_param('iiss', $date, $time,$name,$note);
	    $var = $pstmt->execute();
		var_dump($var);
	    	 
	}
}
