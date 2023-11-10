<?php

require_once("base.php");

class Schedule extends Base {
    public function getDetail($doctor_id) {

		$query = $this->db->prepare("
            SELECT  
                schedule.schedule_id, 
                schedule.schedule_date,
                hours.time_slot,
                schedule.status
            FROM 
                schedule
            INNER JOIN 
                hours
            ON 
                schedule.hour_id = hours.hour_id
            WHERE 
                schedule.doctor_id = ? 
                AND schedule.status = 'available' 
                AND schedule.schedule_date > CURDATE()
		");

		$query->execute([$doctor_id]);

		return $query->fetchAll();

	}
    public function updateState($scheduleId) {
        $query = $this->db->prepare("
            UPDATE schedule
            SET status = 'scheduled'
            WHERE schedule_id = ?
        ");

        return $query->execute([$scheduleId]);
    }
    public function cancelSchedule($scheduleId) {
        $query = $this->db->prepare("
            UPDATE schedule
            SET status = 'available'
            WHERE schedule_id = ?
        ");

        return $query->execute([$scheduleId]);
    }
}

