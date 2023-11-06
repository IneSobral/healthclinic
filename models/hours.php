<?php

require_once("base.php");

class Hours extends Base {
    public function getAll() {

		$query = $this->db->prepare("
        SELECT 
            hour_id,
            time_slot
        FROM 
            hours
		");

		$query->execute();

		return $query->fetchAll();

	}
}
