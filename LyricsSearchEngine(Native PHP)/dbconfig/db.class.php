<?php
//PDO connection to db. CRUD
class pdoCRUD
{
    //database info
    const DB_NAME="lyricssearch";
    const DB_USERNAME="root";
    const DB_PASSWORD="Qwe%$[rty]*@;123";
    const DB_HOST="127.0.0.1";
     
    // db username/pass stored in constants
    private $db;
    private $username=self::DB_USERNAME;
    private $password=self::DB_PASSWORD;
    private $dsn;
     
    //Connect to the database and set the error mode to Exception
    //Throws PDOException on failure
    public function conn()
    {
        if (!$this->db instanceof PDO)
        {
            $this->dsn='mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_HOST;
            $this->db = new PDO($this->dsn, $this->username, $this->password, 
                array(PDO::ATTR_PERSISTENT => true, 
                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
                    ));
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
 
    public function rawQuery($query)
    {
        try {
            $this->conn();
            return $this->db->exec($query);
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    //param string $query the query
    //param string $var the bind variables
    //return array on success or throw PDOException on failure
    public function selectData($query, $var=null)
    {
        try{
            $this->conn();
            $stmt = $this->db->prepare($query);
            $stmt->execute($var);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
 
 
    //param string $query the query
    //param string $var the bind variables
    //return success or throw PDOException on failure
    public function updateData($query, $var=null)
    {
        try{
            $this->conn();
            $stmt = $this->db->prepare($query);
            return $stmt->execute($var);
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
     
    //param string $query the query
    //param string $var the bind variables
    //return success or throw PDOException on failure
    public function deleteData($query, $var=null)
    {
        try{
            $this->conn();
            $stmt = $this->db->prepare($query);
            return $stmt->execute($var);
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
 
 
    //param string $table
    //param array $values
    //return int The last Insert Id on success or throw PDOexeption on failure
    public function insertData($table, $fieldnames, $values)
    {
        $sql = "INSERT INTO $table";
        //set the field names
        $fields = '( ' . implode(' ,', $fieldnames) . ' )';
 
        //setup the placeholders - making the long "(?, ?, ?)..." string
        $rowPlaces = '(' . implode(', ', array_fill(0, count($fieldnames), '?')) . ')';
        $allPlaces = implode(', ', array_fill(0, count($values), $rowPlaces));
 
        //put the query together 
        $sql .= $fields.' VALUES '.$allPlaces;
 
        //put the insert values together
        $insert_values = array();
        foreach($values as $v){
            $insert_values = array_merge($insert_values, array_values($v));
        }
         
        try{
            $this->conn();
            $stmt = $this->db->prepare($sql);
            return $stmt->execute($insert_values);
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>