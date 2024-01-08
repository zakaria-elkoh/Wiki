<?php
    namespace App\Controller;
    // session_start();

    class HomeController
    {
        public function index() {
            require_once  '../../Includes/head.php';
            require_once  '../../Includes/nav.php';
            require_once  '../../views/index.php';
        }
    }