<?php

namespace App\Models;
use App\Models\DB;

class Model extends DB
{
    private $t_name;
    private $conn = null;
    public $notification;
    
    public function __construct()
    {
        $this->conn = parent::getConn();
    }

    public function dbCreate($table,array $data)
    {
        
        $data = $this->escape_str($data);
        $fields = implode(',', array_keys($data));
        $values = "'".implode("','", array_values($data))."'";
        $query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";
        $result = $this->conn->query($query);
        if(!count($result))
        {
            echo 'Not created sucessefull...<br>';
        }
        else
        {
            echo 'Sucessefull created...<br>';
        }
        $this->dbClose();
        
    }
    // Update articule
    public function dbUpdate($table, array $data, $where = null)
    {
       
        $data = $this->escape_str($data);
        foreach ($data as $keys => $values)
        {
            $fields[] = "{$keys} = '{$values}'";
        }
        $fields = implode(',', $fields);
        $where = ($where) ? " WHERE {$where}" : null;
        $query = "UPDATE {$table} SET {$fields}{$where}";
        $result = $this->conn->query($query);
        if(!count($result))
        {
            return "Wasn't possible to update row...<br>";
        }
        else 
        {
            
            return 'Sucessefull updated...<br>';
        }
        $this->dbClose();
    }
    // Reading articules
    public function dbRead($table,$params=null, $fields = '*')
    {
        
        $params = ($params) ? " {$params}" : null;
        $query = "SELECT {$fields} FROM {$table}{$params}";
        $result = $this->conn->query($query);
        
        if(!count($result))
        {
            return "Not found any articule...<br>";
        }
        else 
        {
            while($obj = mysqli_fetch_object($result))
            {
                
                $data[] = $obj;
                
            }
            return $data;
        }
        $this->dbClose();
       
    }
    // Reading articules
    public function dbRelation(array $table, $params, $fields)
    {
        
        $t1 = $table[0];
        $t2 = $table[1];
        $query = "SELECT {$fields} FROM {$t1} AS t1, {$t2} AS t2  {$params} limit 0,1";
        $result = $this->conn->query($query);
        $num = $this->con->num_rows;
        
        if($num > 0)
        {
            while($obj = mysqli_fetch_object($result))
            {
                
                $data[] = $obj;
                
            }
            return $data;
        }
        else 
        {
            return FALSE;
        }
        
        $this->dbClose();
       
    }
    // Delete articule
    public function dbDelete($table,$id)
    {
        
        $query = "DELETE FROM {$table} WHERE id = '{$id}'";
        $result = $this->conn->query($query);
        if(!count($result))
        {
            return "Wasn't possible to delete...<br>";
        }
        else 
        {
            
            return 'Sucessefull Deleted...<br>';
        }
        $this->dbClose();
        
    }
    // Close connection
    private function dbClose()
    {
        @mysqli_close($this->conn) or die(mysqli_error($this->conn()));
        
    }
    // Escape SQL INJECTION;
    private function escape_str($data)
    {
        
        if(!is_array($data))
        {
            $data = mysqli_real_escape_string($this->conn,$data);
        }
        else
        {
            $arr = $data;
            foreach($arr as $keys => $values)
            {
                $keys        = mysqli_real_escape_string($this->conn,$keys);
                $values      = mysqli_real_escape_string($this->conn,$values);
                $data[$keys] = $values;
            }
        }
        
        return $data;
        
    }
    
    public function db_import($table,array $data)
    {
        $fields = implode(',', array_keys($data));
        $values = "'".implode("','", array_values($data))."'";
        $query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";
        $this->conn->query($query);

    }
  
}
