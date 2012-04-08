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
		$db = $this->getDB();
	    $sql = 'DELETE FROM ' . $this->appointmentTable . ' WHERE id = ? ';
	    $pstmt = $db->prepare( $sql );
		$pstmt->bind_param('i', $id);
	    $pstmt->execute();
	}
	
	public function editAppointment($appointment){
		//TODO
	}
	public function getAppointments($startDate,$endDate=null){
		$db = $this->getDB();
		if ($endDate == null){
			$endDate=$startDate;
		}
	    $sql = 'SELECT id, date, time, name, note, seen FROM ' . $this->appointmentTable . ' WHERE date <= ? and date >= ? ORDER BY date,time ASC';
	    
	    $pstmt = $db->prepare( $sql );
	    
		$pstmt->bind_param('ii', $endDate, $startDate);
		
	    $pstmt->execute();
	    $pstmt->bind_result( $id, $date, $time, $name, $note, $seen );
		
	    $ret = array();
	    while($pstmt->fetch()){
	    	$ret[] = new Appointment($id, $name, $date, $time, $note,$seen);
	    }
		
		return $ret;
	}
	public function searchAppointments($name){
		//TODO
	}
	public function getAppointmentById($id){
		$db = $this->getDB();
		
	    $sql = 'SELECT id, date, time, name, note, seen FROM ' . $this->appointmentTable . ' WHERE id = ? ORDER BY date,time ASC';
	    
	    $pstmt = $db->prepare( $sql );
	    
		$pstmt->bind_param('i', $id);
		
	    $pstmt->execute();
	    $pstmt->bind_result( $id, $date, $time, $name, $note, $seen );
		
	    $pstmt->fetch();
		
	    $ret = new Appointment($id, $name, $date, $time, $note,$seen);
	    
		return $ret;
	}
	public function getAppointmentByDateAndTime($date, $time){
		$db = $this->getDB();
		
	    $sql = 'SELECT id, date, time, name, note, seen FROM ' . $this->appointmentTable . ' WHERE date = ? and time = ? ORDER BY date,time ASC';
	    
	    $pstmt = $db->prepare( $sql );
	    
		$pstmt->bind_param('ii', $date, $time);
		
	    $pstmt->execute();
	    $pstmt->bind_result( $id, $date, $time, $name, $note, $seen );
		
	    $ret = array();
	    while($pstmt->fetch()){
	    	$ret[] = new Appointment($id, $name, $date, $time, $note,$seen);
	    }
		
		return $ret;
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
