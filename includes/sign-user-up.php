<?php
    
require dirname(__DIR__).'/config/dbconnect.php';
require dirname(__DIR__).'/classes/model.php';

include_once(dirname(__DIR__).'/classes/session.php');

$dbhandler = new Config() ;
$model = new Model($dbhandler);

if (isset($_POST) && !empty($_POST)) {
    
    if (!$return = $model->validateForm($_POST)) {
        
        if ($_POST['password'] === $_POST['repassword']) {
            
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            
            if (!$model->emailAlreadyUsed($email)) {
                
                if ($model->addUser($email, $password)) {
                    
                    session::set('confirmation', 'You have successfully signed up!');
                    
                } else {
                    
                    session::set('error_general', 'Something went wrong.');

                }
                
            } else {
                
                session::set('error_email', 'This email is already used.');
                
            }
            
        } else {
            
            session::set('error_repassword', 'The two passwords are not the same.');
            
        }
        
    } else {
        
        foreach ($return as $field => $error) {
            
            session::set($field, $error);
            
        }
        
    }
    
}