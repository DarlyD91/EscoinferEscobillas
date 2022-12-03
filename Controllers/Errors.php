<?php
class Errors extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    //funcion para ver la vista de error 
    public function index()
    {
        $this->views->getView('errors', "index");
    }
}