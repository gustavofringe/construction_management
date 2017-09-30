<?php
class Controller
{
    public $session;
    public $form;
    public $service;
    public $views;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->model = new Model();
        $this->views = new View();
        $this->session = new Session();
        $this->form = new Form();
        $this->service = new Service();
    }
}
