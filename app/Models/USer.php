<?php

namespace App\Models;
use App\Models\DBSingleton;

class USer
{
    private $table_name;
    private $conn = null;
    
    public function __construct()
    {
            $this->conn = DBSingleton::getInstance();
        
    }
    
    /*
     * METHOD TO CREATE NEW USER IN THE TABLE
     */

    public function newUser($table_name, array $data)
    {
        $this->table_name = $table_name;
        $fields = implode(',', array_keys($data));
        $values = array_values($data);
        $email = $this->getEmail('t_users', $values[1]);
        $last_id = '';
        
        if(empty($email->email))
        {
            $query = "INSERT INTO ".$this->table_name." ({$fields}) VALUES (:name,:email,:pass,:roles)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $values[0], \PDO::PARAM_INT);
            $stmt->bindParam(':email', $values[1], \PDO::PARAM_INT);
            $stmt->bindParam(':pass', $values[2], \PDO::PARAM_INT);
            $stmt->bindParam(':roles', $values[3], \PDO::PARAM_INT);
            $stmt->execute();
            $last_id = $this->conn->lastInsertId();
            
            return $last_id;
        }
        else
        {
            return $last_id;
        }
                
    }
    /*
     * METHOD THAT VERIFY THE USER ON SYSTEM
     */
    public function getEmail($table_name, $email)
    {
        $this->table_name = $table_name;
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :Uemail limit 0,1";
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam(':Uemail', $email, \PDO::PARAM_INT);
	$stmt->execute();
        $row = $stmt->fetchObject();
        
        return $row;
        
    }
    
}
