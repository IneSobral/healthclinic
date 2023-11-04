<?php

require_once("base.php");

class Doctors extends Base {
    public function getDoctors() {
        
        $query = $this->db->prepare("
			SELECT 
				doctors.doctor_id, 
				doctors.doctor_name, 
				doctors.doctor_img, 
				doctors.interest, 
				doctors.teleconsultation, 
				specialties.speciality_name
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
    
	public function getDetail($doctor_id) {
        $query = $this->db->prepare("
            SELECT * , specialties.specialty_id, specialties.speciality_name
            FROM doctors
            INNER JOIN specialties
            USING(specialty_id)
            WHERE doctor_id = ?
            ");

            $query->execute([
                $doctor_id
            ]);

            return $query->fetch();
    }

    public function getDoctorsBySp($specialty_id) {

        $query = $this->db->prepare("
            SELECT  
                doctors.doctor_id, 
                doctors.doctor_name, 
                specialties.speciality_name
            FROM doctors
            INNER JOIN specialties
            ON doctors.specialty_id = specialties.specialty_id
            WHERE doctors.specialty_id = ?
        ");

        
        $query->execute([$specialty_id]);

        return $query->fetchAll();
    }

} 