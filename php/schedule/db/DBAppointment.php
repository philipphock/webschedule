<?php
class DBAppointments extends DB{
	
	function __construct(){
		$this->appointmentTable = Config::db_prefix . '_' . "appointments";
	}
	
	public function createAppointment($name, $date, $time, $note){
		 
	}
}
