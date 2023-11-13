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

    public function create($data) {

		$query = $this->db->prepare("
            INSERT INTO doctors
                (doctor_name, doctor_img, interest, languages, brief_cv, teleconsultation, doctor_email, available_day, specialty_id)
            VALUES
                (?,?,?,?,?,?, ?, ?, ?)
        ");

		$query->execute([
			$data["doctor_name"],
			$data["doctor_img"],
            $data["interest"],
            $data["languages"],
            $data["brief_cv"],
            $data["teleconsultation"],
            $data["doctor_email"],
            $data["available_day"],
            $data["specialty_id"]
		]);

		$data["doctor_id"] = intval( $this->db->lastInsertId() );
       
		return $data;
	}

    public function removeDoctor($doctorId) {
        $query = $this->db->prepare("
            DELETE FROM doctors
            WHERE doctor_id = ?
        ");

        $query->execute([$doctorId]);
    }


} 