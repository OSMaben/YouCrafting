<?php
//define conenection varaibles here

class Database {
    //conection

    protected $connect_db;

    public function __construct($db_host = "localhost",$db_user = "root",$db_pass = "",$db_name = "youcrafting")
    {
		$this->connect_db = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		
		if (!$this->connect_db)
        {
			echo "Connection failed";
		}
		return $this->connect_db;
	}

    public function show($table,$columns){
        $columns = implode(",",$columns);//to generate a query
        $stml = $this->connect_db->prepare("SELECT {$columns} FROM {$table}");
        $stml->execute();
        $result = $stml->fetchAll();
        return $result;
    }

    public function showArticles($table, $columns, $id)
    {
        $columns = implode(",",$columns);
        $stml = $this->connect_db->prepare("SELECT {$columns} FROM {$table} WHERE ID_Articles = :id");
        $stml->bindParam(":id",  $id);
        $stml->execute();
        $row = $stml->fetch();
        return $row;
    }

    public function insert($table, $columns,$values)
    {
        $columns = implode(",",$columns);
        $values = implode("','",$values);
        $stml = $this->connect_db->prepare("INSERT INTO {$table} ({$columns}) VALUES ('{$values}')");
        $stml->execute();
        return $stml;
    }

    public function delete($table, $column, $id)
    {
        $stml = $this->connect_db->prepare("DELETE FROM {$table} WHERE ({$column}) = ('{$id}')");
        $stml->execute();
        return $stml;
    }

    public function update($table, $key, $value, $where) {
       $updateData = '';

       for($i = 0; $i < count($key); $i++)
       {
            $updateData .= "{$key[$i]} = '{$value[$i]}'";
            if($i < count($key) - 1)
            {
                $updateData .= ",";
            }
       }    
       $stml = $this->connect_db->prepare("UPDATE {$table} SET $updateData WHERE $where");
       $stml->execute();
        return $stml->rowCount();
    } 
}

$test = new Database();

?>