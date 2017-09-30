<?php
class Logout extends Controller
{
    /**
     * Login constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function logout(){
        $this->session->logout();
        die();
    }
}