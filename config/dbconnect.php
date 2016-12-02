<?php

class Config extends PDO {
    
    public $db;
    private $db_engine = 'mysql';
    private $db_host = 'localhost';
    
    private $db_user = 'Arturh';
    private $db_password = 'jaqart_56923';
    private $db_base = 'mexicatours';
    
    function __construct() {
        
        try {
            
            $this->db = parent::__construct("".$this->db_engine.":host=$this->db_host; dbname=$this->db_base", $this->db_user,$this->db_password);
            
        } catch (PDOException $ex) {
             
            echo "Connection error: " . $ex->getMessage();
             
        }
        
    }

}