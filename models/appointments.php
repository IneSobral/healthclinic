<?php

require_once("base.php");

class Appointments extends Base{
    public function create($user_id, $schedule_id){
        $query = $this->db->prepare("
            INSERT INTO appointments
            (user_id, schedule_id)
            VALUES (?, ?)
            ");
        return $query->execute([
            $user_id, $schedule_id
        ]);

       
    }

    public function getDetail($user_id) {
        $query = $this->db->prepare("
            SELECT schedule.schedule_id, schedule.schedule_date, schedule.status, hours.time_slot, doctors.doctor_name
            FROM appointments
            INNER JOIN schedule
            USING(schedule_id)
            INNER JOIN hours
            USING(hour_id)
            INNER JOIN doctors
            USING(doctor_id)
            WHERE appointments.user_id = ?
            ORDER BY schedule_date DESC LIMIT 8
            ");

            $query->execute([
                $user_id
            ]);

            return $query->fetchAll();
    }

    public function getById($user_id) {
        $query = $this->db->prepare('
            SELECT schedule.schedule_id, schedule.schedule_date, schedule.status, hours.time_slot, doctors.doctor_name
            FROM appointments
            INNER JOIN schedule
            USING(schedule_id)
            INNER JOIN hours
            USING(hour_id)
            INNER JOIN doctors
            USING(doctor_id)
            WHERE appointments.user_id = ? AND schedule.status = "scheduled"
            ORDER BY schedule_date DESC LIMIT 8
        ');
    
        $query->execute([$user_id]);
    
        return $query->fetchAll();
    }


}

?>