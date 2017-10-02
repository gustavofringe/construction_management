<?php
class Session
{
    /**
     * Session constructor.
     */
    public function __construct()
    {
        if(!isset($_SESSION)){
            session_start();
        }
    }

    /**
     * @param $message
     * @param string $type
     * return flash message at view
     */
    public static function setFlash($message, $type = 'success')
    {
        $_SESSION['flash'][$type] = $message;
    }

    /**
     * @param $user
     * @return bool
     */
    public static function isLogged($user){
        return isset($_SESSION[$user]);
    }

    /**
     * @param $key
     * @param $value
     */
    public static function write($key, $value){
        $_SESSION[$key] = $value;
    }

    /**
     * @return string
     */
    public static function flash(){
        if(isset($_SESSION['flash']['message'])){
            $html = '<div class="alert alert- '.$_SESSION['flash']['type'].'"><p>'.$_SESSION['flash']['message'].'</p></div>';
            $_SESSION['flash'] = array();
            return $html;
        }
    }

    /**
     * deconnect user
     */
    public static function logout(){
        session_start();
        session_destroy();
        View::redirect(BASE_URL);
        die();
    }
}
