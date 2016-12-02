<?php

class Tour {
    
    private $db;
    private $table_name = "tour";
    
    public $id;
    public $name;
    public $about;
    public $departureTime;
    public $arriveTime;
    public $price;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    function create(){
        
        $query =    "INSERT INTO " . $this->table_name . "
                        SET
                            name = :name, 
                            about = :about, 
                            departureTime = :departureTime, 
                            arriveTime = :arriveTime, 
                            price = :price
                    ";
        
        $statement = $this->db->prepare($query);
        
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->about = htmlspecialchars(strip_tags($this->about));
        $this->departureTime = htmlspecialchars(strip_tags($this->departureTime));
        $this->arriveTime = htmlspecialchars(strip_tags($this->arriveTime));
        $this->price = htmlspecialchars(strip_tags($this->price));
        
        $statement->bindParam(":name", $this->name);
        $statement->bindParam(":about", $this->about);
        $statement->bindParam(":departureTime", $this->departureTime);
        $statement->bindParam(":arriveTime", $this->arriveTime);
        $statement->bindParam(":price", $this->price);
        
        if ($statement->execute()) {
            
            return true;
            
        } else {
            
            echo "<pre>";
            
                print_r($statement->errorInfo());
                
            echo "</pre>";

            return false;
        }
    }
    
}