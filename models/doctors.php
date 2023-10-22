<?php

require_once("base.php");

class Doctors extends Base {
    public function getDoctors() {
        
        $query = $this->db->prepare("
			SELECT *
			FROM doctors
            INNER JOIN specialties
            USING(specialty_id)
		");
		
		$query->execute();
		
		return $query->fetchAll();
    }
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