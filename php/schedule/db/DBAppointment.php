<?php
class DBAppointment extends DB{
	
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
		
		if (!$this->appointmentTable) throw new Exception("error creating database entry");
	    $sql = 'INSERT INTO ' . $this->appointmentTable . '(date,time,name,note) VALUES (?,?,?,?)';
	    $pstmt = $db->prepare( $sql );
		$pstmt->bind_param('iiss', $date, $time,$name,$note);
	    $success = $pstmt->execute();
		if (!$success){
			throw new Exception("error creating database entry");
		}
	    	 
	}
	
	public function deleteAppointment($id){
		//TODO
	}
	public function editAppointment($appointment){
		//TODO
	}
	public function getAppointments($startDate,$endDate=null){
		//TODO
	}
	public function searchAppointments($name){
		//TODO
	}
	public function getAppointment($id){
		//TODO
	}
	public function getAppointment($date, $time){
		//TODO
	}
	
	/**
	 * Deletes all seen and expired dates
	 * @return array of deleted appointments 
	 */
	public function purge(){
		//TODO
	}
	
	public function getExpiredAndUnseenAppointments(){
		//TODO
	}
}
