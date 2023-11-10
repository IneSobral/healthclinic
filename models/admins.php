<?php

require_once("base.php");

class Admins extends Base
{
    public function login($data) {
        $query = $this->db->prepare("
            SELECT admin_id, password
            FROM admins
            WHERE email = ?
        ");
        
        $query->execute([$data["email"]]);
        
        return $query->fetch();
    }


    public function insertAdmin($email, $password) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = $this->db->prepare("
            INSERT INTO admins (email, password)
            VALUES (?, ?)
        ");

        $query->execute([$email, $hashedPassword]);
    }

    public function getById($admin_id) {
        $query = $this->db->prepare('
            SELECT email, name
            FROM admins
            WHERE admin_id = ?
        ');
    
        $query->execute([$admin_id]);
    
        return $query->fetch();
    }

}




