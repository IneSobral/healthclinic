<?php

require_once('base.php');

class Users extends Base {

    public function getByEmail($user_email) {
        $query = $this->db->prepare('
        SELECT user_id, password
        FROM users
        WHERE user_email = ? 
        ');
        $query->execute([ $user_email ]); 
        return $query->fetch();
    }

    public function create($data) { 

        $api_key = bin2hex(random_bytes(16));

        $query = $this->db->prepare("
        INSERT INTO users
        (user_name, user_email, password, street_name, city, zip_code, country, user_contact, api_key)
        VALUES(?,?,?,?,?,?,?,?,?);
        ");
    
        $query->execute([
            $data["user_name"],
            $data["user_email"],
            password_hash($data["password"], PASSWORD_DEFAULT), 
            $data["street_name"],
            $data["city"],
            $data["zip_code"],
            $data["country"],
            $data["user_contact"],
            $api_key  
        ]);
    
        $data["user_id"] = $this->db->lastInsertId();
        $data["api_key"] = $api_key;

        return $data;
      
    }
    
    public function getAll() {
            $query = $this->db->prepare('
            SELECT *
            FROM users
            ');

            $query->execute();

            return $query->fetchAll();
        }

    
        public function getById($user_id) {
            $query = $this->db->prepare('
                SELECT *
                FROM users
                WHERE user_id = ?
            ');
        
            $query->execute([$user_id]);
        
            return $query->fetch();
        }

        public function updateUser($data, $id){

            $query = $this->db->prepare("
                UPDATE
                    users
                SET
                    street_name = ?,
                    city = ?,
                    zip_code = ?,
                    country = ?
                WHERE
                    user_id = ?
            ");
    
            $query->execute([
                $data["street_name"],
                $data["city"],
                $data["zip_code"],
                $data["country"],
                $id
            ]);
    
    
    
            $data["user_id"] = $id;
    
            return $data;
    
        }
}
