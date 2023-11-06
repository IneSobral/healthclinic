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
            SELECT *
            FROM appointments
            INNER JOIN schedule
            USING(schedule_id)
            INNER JOIN hours
            USING(hour_id)
            INNER JOIN doctors
            USING(doctor_id)
            WHERE user_id = ?
            ORDER BY appointment_id DESC
            ");

            $query->execute([
                $user_id
            ]);

            return $query->fetch();
    }


}

?>