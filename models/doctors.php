<?php

require_once("base.php");

class Doctors extends Base {
   
    public function getDoctorsCount() {
        $query = $this->db->prepare("
			SELECT COUNT(*) as count
			FROM doctors
		");
		
		$query->execute();
		
		$result = $query->fetch();
        return $result['count'];
    }
   
}