<?php

    namespace App\Controller;    
    use App\Models\UserModel;
    use App\Models\WikiModel;
    use App\Models\CategoryModel;

    if($_SESSION['user_role_id'] !== 1) {
        echo "<pre>";
        echo "<div><h1 class='mb-4 text-7 xl font-extrabold leading-none tracking-tight text-red-900 md:text-5xl lg:text-6xl dark:text-white'>What you tring to do nigga?</h1></div>";
        echo "</pre>";
        die;
    }

    class DashboardController 
    {
        
        public function index() {
            
            require_once '../../Includes/head.php';
            require_once '../../views/Admin/dashboard.php';
        }
        
        public function showUsers() {
            $userModel = new UserModel();
            $users = $userModel->findAllUsers();
            
            require_once '../../Includes/head.php';
            require_once '../../views/Admin/users.php';
        }
        
        public function showWikis() {
            $wikiModel = new WikiModel();
            $wikis = $wikiModel->findAllWikis();
            
            require_once '../../Includes/head.php';
            require_once '../../views/Admin/wikis.php';
        }
        
        public function showCategories() {
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->findAllCategories();
            
            if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add'])) {

                $categoryModel = new CategoryModel();
                $categories = $categoryModel->findAllCategories();
                
                echo "<pre>";
                var_dump($_POST);
                echo "</pre>";
                die;
            }

            
            require_once '../../Includes/head.php';
            require_once '../../views/Admin/categories.php';
        }

    }