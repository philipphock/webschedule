<?php
class Filter{
	function __construct($future, $past, $seen, $unseen){
		$this->future = $future;
		$this->past = $past;
		$this->seen = $seen;
		$this->unseen = $unseen;
	}
	
	public function getQuery(){
		$date = date("Ymd");
		$query = " WHERE ";
		$atleastone = false;
		$and = " ";
		$or = " (";
		if ($this->future){
			$query .= "( date >= $date";
			$or = " OR ";
			$and = " AND ";
			$atleastone = true;
		}
		if ($this->past){
			$query .= "$or date <= $date )";
			$and = " AND ";
			$atleastone = true;
		}else if($this->future){
			$query .= " )";
		}
		
		$or = " (";
		if ($this->seen){
			$query .= "$and  ( seen = 1";
			$or = " OR ";
			$and = " ";
			$atleastone = true;
		}
		if ($this->unseen){
			$query .= "$and $or seen = 0 )";
			$atleastone = true;
		}else if ($this->seen){
			$query .= " )";
		}
		
		if (!$atleastone) return false;
		return $query;
	} 
}
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
		$db->close();
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
		$db->close();
	}
	
	public function editAppointment($appointment){
		$db = $this->getDB();
		
		if (!$this->appointmentTable) throw new Exception("error editing database entry");
		
	    $sql = 'UPDATE ' . $this->appointmentTable . ' SET date = ? , time = ? , name = ? , note = ? WHERE id = ?';
	    $pstmt = $db->prepare( $sql );
		$pstmt->bind_param('iissi', $appointment->getDate(), $appointment->getTime(),$appointment->getName(),$appointment->getNote(),$appointment->getId());
	    $success = $pstmt->execute();
		$db->close();
		if (!$success){
			throw new Exception("error creating database entry");
		}
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
		$db->close();
		return $ret;
	}
	public function searchAppointments($q){
		$db = $this->getDB();
		$q = "%".$q."%";
	    $sql = 'SELECT id, date, time, name, note, seen FROM ' . $this->appointmentTable . ' WHERE name LIKE ? ORDER BY date,time ASC';
	    
	    $pstmt = $db->prepare( $sql );
	    
		$pstmt->bind_param('s', $q);
		
	    $pstmt->execute();
	    $pstmt->bind_result( $id, $date, $time, $name, $note, $seen );
		
	    $ret = array();
	    while($pstmt->fetch()){
	    	$ret[] = new Appointment($id, $name, $date, $time, $note,$seen);
	    }
	    $db->close();
		return $ret;
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
	    $db->close();
		return $ret;
	}
	public function setSeen($id,$yes=true){
		$db = $this->getDB();
		
		if (!$this->appointmentTable) throw new Exception("error editing database entry");
		$yes=$yes?1:0;
	    $sql = 'UPDATE ' . $this->appointmentTable . ' SET seen = ? WHERE id = ?';
	    $pstmt = $db->prepare( $sql );
		$pstmt->bind_param('ii', $yes,$id);
	    $success = $pstmt->execute();
		$db->close();
		if (!$success){
			throw new Exception("error creating database entry");
		}
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
		$db->close();
		return $ret;
	}
	
	
	public function getAppointmentFilter(Filter $filter){
		$db = $this->getDB();
		$query = $filter->getQuery();
		
		//if (!$query) return array();		
	    $sql = 'SELECT id, date, time, name, note, seen FROM ' . $this->appointmentTable . $query . ' ORDER BY date,time ASC';
	    
	    $pstmt = $db->prepare( $sql );
	    
	    $pstmt->execute();
	    $pstmt->bind_result( $id, $date, $time, $name, $note, $seen );
		
	    $ret = array();
	    while($pstmt->fetch()){
	    	$ret[] = new Appointment($id, $name, $date, $time, $note,$seen);
	    }
		$db->close();
		return $ret;
		
	}
	
	
}
