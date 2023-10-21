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
}