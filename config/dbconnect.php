<?php

class Config extends PDO {
    
    public $db;
    private $db_engine = 'mysql';
    private $db_host = 'localhost';
    
    private $db_user = 'vaksfk';
    private $db_password = 'jaqart_';
    private $db_base = 'woloskyg_mexica';
    
    function __construct() {
        
        try {
            
            $this->db = new PDO("".$this->db_engine.":host=$this->db_host; dbname=$this->db_base", $this->db_user,$this->db_password);
            
        } catch (PDOException $ex) {
             
            echo "Connection error: " . $ex->getMessage();
             
        }
        
    }

}