<?php

require_once("base.php");

class Specialties extends Base {
    public function getSpecialtiesCount() {
        
        $query = $this->db->prepare("
			SELECT COUNT(*) as count
			FROM specialties
		");
		
		$query->execute();
		
		$result = $query->fetch();
        return $result['count'];
        
    }

	public function getAll() {

		$query = $this->db->prepare("
		SELECT 
			specialty_id,
			speciality_name
		FROM 
			specialties
		");

		$query->execute();

		return $query->fetchAll();

	}
}