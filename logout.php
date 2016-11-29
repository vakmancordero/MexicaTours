<?php 

    include_once('/classes/session.php');
    
    require __DIR__. '/includes/header.php'; 

    if (isset($_SESSION['user_session'])) {
        
        session::destroy('user_session');
        
        header('location:index.php');
        
    }
    
    require __DIR__. '/includes/footer.php'; 
