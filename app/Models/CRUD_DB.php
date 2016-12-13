<?php

namespace App\Models;
use App\Models\DBSingleton;

class CRUD_DB
{
 
        private $table_name;
        private $conn = null;

        public function __construct()
        {
                $this->conn = DBSingleton::getInstance();

        } 
	/*
         * METHOD TO READ ALL ROWS IN THE TABLE
         */
	public function select_all($table_name)
	{
                $this->table_name = $table_name;
                $query = " SELECT * FROM ".$this->table_name." ORDER BY id DESC";
                $stmt = $this->conn->prepare($query);
                $stmt->execute(); 
                return $stmt;
        }
	/*
         * METHOD TO READ ON ROW IN THE TABLE
         */
	public function select_one($table_name)
	{
		$this->table_name = $table_name;
                $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? limit 0,1";
                $stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $_POST['id']);
		$stmt->execute();
		return $stmt;
		
	}
	/*
         * METHOD TO COUNT NUMBERS OF ROWS IN THE TABLE
         */
	public function count_all($table_name)
	{
	
		$this->table_name = $table_name;
		$query = "SELECT id FROM ".$this->table_name."";
                $stmt = $this->conn->prepare($query);
		$stmt->execute();
                $num = $stmt->rowCount();
                return $num;
	}
	/*
         * METHOD TO UPDATE ROW IN THE TABLE
         */
	public function update($table_name,$array_data)
	{
		$this->table_name = $table_name;
                $query = "UPDATE
					" . $this->table_name . "
				SET
					field1 = ?,
					field2 = ?,
					field3 = ?,
					field4 = ?
				WHERE
					id = ?";
	 
		$stmt = $this->conn->prepare($query);
                $rows = array($fields);
                
		if($stmt->execute($rows))
		{
			return true;
		}else
		{
			return false;
		}
	}
	/*
         * METHOD TO CREATE ROW IN THE TABLE
         */
	public function create($table_name,$array_data)
	{
		$this->table_name = $table_name;
		$query = "INSERT INTO ".$this->table_name."(field1, field2,field3, field4) VALUES (:field1, :field2, :field3, :field4)')";
                $stmt = $this->conn->prepare($query);
                $rows = array(':field1'=>$_POST['field1'],':field2'=>$_POST['field2'],':field3'=>$_POST['field3'],':field4'=>$_POST['field4']); 
        
		if($stmt->execute($rows))
		{
			return true;
		}else
		{
			return false;
		}
	}
	/*
         * METHOD TO DELETE ROW IN THE TABLE
         */
	public function delete($table_name,$id)
	{
		$this->table_name = $table_name;
		$query = "DELETE FROM".$this->table_name."WHERE id = :id";
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
