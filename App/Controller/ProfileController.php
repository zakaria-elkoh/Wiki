<?php
    namespace App\Controller;
    use App\Models\ProfileModel;
    use App\Models\WikiModel;


    class ProfileController
    {


        public function index() {

            if(!isset($_SESSION['user_id'])) {
                echo "you are not logged in man";
                die();
            } else {
                
                $user_id = $_SESSION['user_id'];
                
                $wikiModel = new WikiModel();
                $wikis = $wikiModel->allByUserId($user_id);
    
                require_once  '../../Includes/head.php';
                require_once  '../../Includes/nav.php';
                require_once '../../views/User/profile.php';
            }


        }



    }