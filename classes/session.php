<?php

if (!isset($_SESSION)) {
    session_start();
}

class session {
    
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
        return true;
    }
    
    public static function get($key) {
       return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }
    
    public static function destroy($key) {
        unset($_SESSION[$key]);
    }
    
}