<?php

    namespace App\Controller;
    use App\Models\WikiModel;

    class WikiController
    {
        public function index() {
            
        }

        public function createWiki() {

            if(empty($_SESSION)) {
                header('Location: signin');
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["create_wiki"])) {

                $title = $_POST['title'];
                $description = $_POST['description'];
                $content = $_POST['content'];
                $time_to_read = $_POST['time_to_read'];
                $category_id = $_POST['category_id'];

                
                $wikiModel = new WikiModel();
                $result = $wikiModel->createWiki($title, $description, $content, $time_to_read, $category_id);
                
                // echo "<pre>";
                // var_dump($result);
                // echo "</pre>";
                // die();

            }

            require_once '../../Includes/head.php';
            require_once '../../Includes/nav.php';             
            require_once '../../views/User/write.php';
        }

        public function showWiki() {

            $target_wiki_id = $_GET['wiki_id'];

            $wikiModel = new WikiModel();
            $wiki = $wikiModel->findWiki($target_wiki_id);
                
            // echo "<pre>";
            // var_dump($wiki);
            // echo "</pre>";
            // die();


            require_once '../../Includes/head.php';
            require_once '../../Includes/nav.php';             
            require_once '../../views/User/wiki.php';
        }

    }