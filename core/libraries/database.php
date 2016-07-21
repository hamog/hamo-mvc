<?php
/**
 * Database - connect to MySQL database and CRUD operations in database
 * Extends by PDO (PHP Data Objects) 
 * credit by hashem moghaddari <hashemm364@gmail.com>
 */

class Database extends PDO {
    public $isConnected;
    protected $db;
    
    public function __construct($dbType, $dbHost, $dbName, $dbCharset, $dbUser, $dbPassword, $options){
        $this->isConnected = TRUE;
        try{
            $this->db =  parent::__construct($dbType.':host='.$dbHost.';dbname='.$dbName.';charset='.$dbCharset.'',$dbUser,$dbPassword, $options);
            $this->db .= parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db .= parent::setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e){
            $this->isConnected = FALSE;
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Select
     * @param $Sql
     * @param array $data
     * @param int $fetchMode
     * @return array
     */
    public function Select($Sql, $data=array(), $fetchMode= PDO::FETCH_ASSOC){
        $stmt = $this->prepare($Sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        return $stmt->fetchAll($fetchMode);

    }
    /**
     * Insert Method
     * @param $table
     * @param $data
     */
    public function Insert($table, $data){
        ksort($data);
        $fieldKey = implode('`, `',array_keys($data));
        $fieldValue = ':'.implode(', :', array_keys($data));

        $stmt = $this->prepare("INSERT INTO `$table`(`$fieldKey`) VALUES ($fieldValue)");
        foreach($data as $key=>$value){
            $stmt->bindValue($key, $value);
        }
        if($stmt->execute()){
            return TRUE;
        } else{
            return FALSE;
        }

    }

    /**
     * Update Method
     * @param $table
     * @param $data
     * @param $where
     */
    public function Update($table, $data, $where){
        ksort($data);

        $fieldDetails = "";
        foreach($data as $key=>$value){
            $fieldDetails .= " `$key`= :$key, ";
        }
        $fieldDetails =rtrim($fieldDetails, ', ');

        $stmt = $this->prepare("UPDATE `$table` SET $fieldDetails WHERE $where");
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        if($stmt->execute()){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Delete From a Table
     * @param $table
     * @param $where
     * @return bool
     */
    public function Delete($table, $where){
        $stmt =$this->prepare("DELETE FROM {$table} WHERE {$where}");
        return $stmt->execute();
    }
    
    /**
     * Escape all user input values
     * @param string $input -Pure data
     * @return string -Escaped data
     */
    public function Escape($input){
        $output = htmlentities($input, ENT_QUOTES, 'utf-8');
        return $output;
    }
    
    /**
     * 
     * @param string $table
     * @return integer total numbers of in table
     */
     public function TotalRows($table, $where='') {
          $numRows= $this->Select("SELECT * FROM `$table`"." $where");
          return count($numRows);
    }
    
    /**
     * disconnect to database
     */
    public function __destruct() {
        $this->db = NULL;
        $this->isConnected = FALSE;
    }
    
} 
