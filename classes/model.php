<?php

class Model {

    private $errors = array();

    public function __construct( $dbh ) {
        $this->db = $dbh->db;
    }
    
    public function validateForm( $data ) {
        
        foreach ($data as $index => $value) {
            
            if ( empty($value) || trim($value) == '' ) {
                
                $this->errors['error_'.$index] =  'Por favor, completa el campo '.$index.'';
                
            }
            
        }
        
        return sizeof($this->errors) == 0 ? false : $this->errors;
        
    }


    public function hash_password( $password ) {
        
        if (!empty($password)) {
            
            $jeton = "";
            
            $salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
            
            for($i = 0; $i < 22; $i++) {
                
                $jeton .= $salt_chars[array_rand($salt_chars)];
                
            }
            
            return crypt($password, sprintf('$2y$%02d$', 7) . $jeton);

        } else {
            
            return false;
            
        }
        
    }


    public function signIn( $email, $password ) {
        
        $query = $this->db->prepare(
                "SELECT user_email, user_password FROM users WHERE user_email = ?"
        );
        
        if ($query->execute(array($email))) {
            
            $query->setFetchMode(PDO::FETCH_OBJ);
            
            $fetchedData = $query->fetch();
            
            $digest = isset($fetchedData->user_password) ? $fetchedData->user_password : null;
            
            if (!is_null($digest)) {
                
                return $digest === crypt($password, $digest);
                
            } else {
                
                return false;
                
            }
            
        } else {
            
            return false;
            
        }
        
    }

    public function emailAlreadyUsed( $email ) {
        
        $query = $this->db->prepare("SELECT COUNT(*) AS num FROM users WHERE user_email = ?");
        
        if ($query->execute(array($email))) {
            
            $query->setFetchMode(PDO::FETCH_OBJ);
            
            $fetchedData = $query->fetchAll();

            $total = isset($fetchedData[0]) ? $fetchedData[0]->num : null;
            
            return $total != 0;
            
        } else {
            
            return false;
            
        }
    }


    public function addUser($email, $password) {
        
        if (!empty($email) && !empty($password)) {
            
            $query = $this->db->prepare("INSERT INTO users (user_email, user_password, date_signed_up)  VALUES(?,?,?) ");
            
            return $query->execute(array($email, $this->hash_password($password), time()));
            
        } else {
            
            return false;
            
        }
        
    }

}