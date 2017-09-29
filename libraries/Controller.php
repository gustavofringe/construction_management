<?php
class Controller
{
    public $session;
    public $form;
    public $service;
    public $values;

    public function __construct()
    {
        $this->session = new Session();
        $this->form = new Form();
        $this->service = new Service();
    }
    public function set($values){
        $this->values = $values;
        return $values;
    }
}
