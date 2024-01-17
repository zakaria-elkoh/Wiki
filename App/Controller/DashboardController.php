<?php

    namespace App\Controller;    
    use App\Models\UserModel;
    use App\Models\WikiModel;
    use App\Models\CategoryModel;
    use App\Models\TagModel;

    if($_SESSION['user_role_id'] !== 1) {
        require_once '../../views/User/403.php';
        die;
    }

    class DashboardController 
    {
        
        public function index() {
            // get total wikis
            $wikiModel = new WikiModel();
            $total_wikis = $wikiModel->totalWikis();
            // get total users
            $userModel = new UserModel();
            $total_users = $userModel->totalUsers();
            // get total tags
            $tagModel = new TagModel();
            $total_tags = $tagModel->totalTags();
            // get total categories
            $categoryModel = new CategoryModel();
            $total_categories = $categoryModel->totalCategories();
            
            require_once '../../Includes/head.php';
            require_once '../../views/Admin/dashboard.php';
        }
        
        public function showUsers() {

            $userModel = new UserModel();
            
            if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
                $user_target_id = $_GET['id'];
                $success = $userModel->deleteCategory($user_target_id);
            }
            
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
            
            if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add'])) {
                $new_category = $_POST['new_category'];
                $success = $categoryModel->addCategory($new_category);
            }
            
            if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
                $category_target_id = $_GET['id'];
                $success = $categoryModel->deleteCategory($category_target_id);
            }

            $categories = $categoryModel->findAllCategories();

            
            require_once '../../Includes/head.php';
            require_once '../../views/Admin/categories.php';
        }
        
        public function showTags() {

            $tagModel = new TagModel();
            
            if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add'])) {
                $new_tag = $_POST['new_tag'];
                $success = $tagModel->addTag($new_tag);
            }
            
            if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
                $tag_target_id = $_GET['id'];
                $success = $tagModel->deleteTag($tag_target_id);
            }

            $tags = $tagModel->findAllTags();
            
            require_once '../../Includes/head.php';
            require_once '../../views/Admin/tags.php';
        }

    }