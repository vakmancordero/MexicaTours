<?php

require dirname(__DIR__). '/config/dbconnect.php';
require dirname(__DIR__). '/classes/model.php';

include(dirname(__DIR__). '/classes/session.php');

$dbhandler = new Config() ;
$model = new Model($dbhandler);

if (isset($_POST) && !empty($_POST) )  {
    
    if (!$return = $model->validateForm($_POST)) {
        
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        
        $password = $_POST['password'];
        
        if ($model->signIn( $email, $password )) {
            
            session::set('user_session', $email);
            
        } else {
            
            session::set('login_issue', "Can't log you in. Check your details.");
            
        }
        
    } else {
        
        foreach ($return as $field => $error) {
            
            session::set($field, $error);
            
        }
        
    }
    
}