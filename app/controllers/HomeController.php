<?php
class HomeController{

    public function index(){
        $title = 'Home Page';
        $header = 'Welcome to the Home Page';
        $message = 'This is the home page of our MVC application.';

        require_once __DIR__ . '/../views/homeView.php';
    }
}