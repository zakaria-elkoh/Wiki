<?php

    namespace App\Controller;    
    use App\Models\User;

    class DashboardController 
    {
        
        public function index() {
            
            require_once '../../Includes/head.php';
            require_once '../../views/Admin/dashboard.php';
        }
        
        public function showUsers() {
            $user = new User();
            $users = $user->findAllUsers();

            require_once '../../Includes/head.php';
            require_once '../../views/Admin/users.php';
        }
        
        public function showWikis() {
            
            require_once '../../Includes/head.php';
            require_once '../../views/Admin/wikis.php';
        }

    }