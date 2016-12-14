<?php

namespace App\Models;
use App\Models\DBSingleton;

class CRUD_DB
{
 
        private $t_name;
        private $conn = null;

        public function __construct()
        {
                $this->conn = DBSingleton::getInstance();

        } 
	/*
         * @METHOD TO READ ALL ROWS FROM THE TABLE
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
         * @METHOD TO READ ONE ROW FROM THE TABLE
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
         * @METHOD TO COUNT NUMBERS OF ROWS IN THE TABLE
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
         * @METHOD TO UPDATE ROW IN THE TABLE
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
         * @METHOD TO DELETE ROW FROM THE TABLE
         */
	public function removeRow($t_name,$id)
	{
		$this->t_name = $t_name;
		$query = "DELETE FROM ".$this->t_name."WHERE id = :id";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return true;
		}else
		{
			return false;
		}
	}
}
