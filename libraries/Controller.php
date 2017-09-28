<?php
class Controller
{
    public $session;
    public $form;
    public $service;
    public function __construct()
    {
        $this->session = new Session();
        $this->form = new Form();
        $this->service = new Service();
    }
}
