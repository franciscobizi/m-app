<?php

namespace App\Models;
use App\Models\DBSingleton;
use PDO;

class CRUD_DB
{
 
        private $t_name;
        private $conn = null;
        public $notification;

        public function __construct()
        {
                $this->conn = DBSingleton::getInstance();

        } 
	/*
         * METHOD TO READ ALL ROWS FROM THE TABLE
         */
	public function getRows($t_name)
	{
                $this->t_name = $t_name;
                $query = " SELECT * FROM ".$this->t_name." ORDER BY id DESC";
                $stmt = $this->conn->prepare($query);
                $stmt->execute();
                if($stmt->rowCount()>0)
                {
                    return $stmt;
                }
                else
                {
                    return false; 
                }
        }
        /*
         * METHOD TO READ ALL ROWS FROM THE TABLE
         */
	public function getHasMany($tb1,$tb2)
	{
                
                $query = "SELECT t1.id, t1.name, t1.status, t1.created_at, t1.grau, t1.grole, t1.birth, t2.phone, t2.email, t2.city, t2.adress, t2.guestid FROM $tb1 AS t1, "
                        . "$tb2 AS t2 WHERE t1.id = t2.guestid ORDER BY id DESC";
                $stmt = $this->conn->prepare($query);
                $stmt->execute();
                //$row = $stmt->fetch(\PDO::FETCH_OBJ);
                return $stmt;
        }
        
        public function getRelation(array $table, $params, $fields)
        {
            $t1 = $table[0];
            $t2 = $table[1];
            $data = [];
            $query = "SELECT {$fields} FROM {$t1} AS t1, {$t2} AS t2  {$params} limit 0,1";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            while($obj = $stmt->fetch(PDO::FETCH_OBJ))
            {

                    $data[] = $obj;

            }
            return $data;
            
        }
        
	/*
         * METHOD TO READ ONE ROW FROM THE TABLE
         */
	public function getRow($t_name,$id)
	{
		$this->t_name = $t_name;
                $query = "SELECT * FROM " . $this->t_name . " WHERE id = ? limit 0,1";
                $stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $id);
		$stmt->execute();
		return $stmt;
		
	}
        /*
         * @METHOD TO READ ONE ROW FROM THE TABLE
         */
	public function getRowGuest($t_name,$name)
	{
		$this->t_name = $t_name;
                $query = "SELECT name FROM " . $this->t_name . " WHERE name = ? limit 0,1";
                $stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $name);
                $stmt->execute();
                if($stmt->rowCount() > 0)
                {
                    return true;
                }
                else
                {
                    return false;
                }
		
		
	}
	/*
         * METHOD TO COUNT NUMBERS OF ROWS IN THE TABLE
         */
	public function countRows($t_name)
	{
	
		$this->t_name = $t_name;
		$query = "SELECT id FROM ".$this->t_name."";
                $stmt = $this->conn->prepare($query);
		$stmt->execute();
                $num = $stmt->rowCount();
                return $num;
	}
        /*
         * METHOD TO COUNT NUMBERS OF ROWS IN THE TABLE
         */
        public function getRowsByDate($t_name, $days)
	{
                $today = date('Y-m-d');
                $range = date('Y-m-d', strtotime("-$days days"));
		$this->t_name = $t_name;
		$query = "SELECT * FROM $this->t_name WHERE created_at BETWEEN '$range' AND '$today' ";
                $stmt = $this->conn->prepare($query);
		$stmt->execute();
                $num = $stmt->rowCount();
                return $num;
	}
        /*
         * METHOD TO PUSH NOTIFICATIONS FROM TABLE
         */
        public function getPush($t_name, $days)
	{
                $today = date('Y-m-d');
                $range = date('Y-m-d', strtotime("-$days days"));
		$this->t_name = $t_name;
		$query = "SELECT * FROM $this->t_name WHERE created_at BETWEEN '$range' AND '$today' ";
                $stmt = $this->conn->prepare($query);
		$stmt->execute();
                
                return $this->notification = $stmt;
	}
	/*
         * METHOD TO UPDATE ROW IN THE TABLE
         */
	public function updateRow($t_name,array $a)
	{
		$this->t_name = $t_name;
                
                $qry = "UPDATE $this->t_name SET";
                $values = array();

                foreach ($a as $field => $value) {
                    $qry .= ' '.$field.' = :'.$field.',';
                    $values[':'.$field] = $value;
                }

                $qry = substr($qry, 0, -1).';'; 

                $q = $this->conn->prepare($qry);

		if($q->execute($values))
		{
                    return true;
		}else
		{
                    return false;
		}
	}
	/*
         * @METHOD TO CREATE ROW IN THE TABLE
         */
	public function setRow($t_name, array $a)
	{
		$this->t_name = $t_name;
                
                $keys = array_keys($a);
                $sql = "INSERT INTO $this->t_name (".implode(", ",$keys).") \n";
                $sql .= "VALUES ( :".implode(", :",$keys).")";        
                $q = $this->conn->prepare($sql);
                
		if($q->execute($a))
		{
                    return true;
		}else
		{
                    return false;
		}
	}
        /*
         * @METHOD TO CREATE ROW IN THE TABLE
         */
	public function setRowToMany($t_name, array $a)
	{
		$this->t_name = $t_name;
                
                $keys = array_keys($a);
                $sql = "INSERT INTO $this->t_name (".implode(", ",$keys).") \n";
                $sql .= "VALUES ( :".implode(", :",$keys).")";        
                $q = $this->conn->prepare($sql);
                
		if($q->execute($a))
		{
                    return $last_id = $this->conn->lastInsertId();
		}
	}
	/*
         * @METHOD TO DELETE ROW FROM THE TABLE
         */
	public function removeRow($t_name,$field, $id)
	{
		$this->t_name = $t_name;
		$query = "DELETE FROM ".$this->t_name." WHERE $field = :id";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id, \PDO::PARAM_INT);
		if($stmt->execute())
		{
			return true;
		}else
		{
			return false;
		}
	}
}
