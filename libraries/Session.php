<?php
class Session
{
    public static function setFlash($message, $type = 'success')
    {
        $_SESSION['flash'][$type] = $message;
    }
    public static function start($val){
        if (!isset($_SESSION[$val]))
        {
            session_start();
        }
    }
}