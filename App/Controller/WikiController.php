<?php

    namespace App\Controller;
    use App\Models\WikiModel;
    use App\Models\CategoryModel;
    use App\Models\TagModel;

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
                $new_wiki_tags_id = $_POST['tags'];
                $user_id = $_SESSION['user_id'];
                $statu = 'show';

                $wikiModel = new WikiModel();
                $success = $wikiModel->createWiki($title, $description, $content, $time_to_read, $category_id, $new_wiki_tags_id, $user_id, $statu);

            }

            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["update_wiki"])) {

                $wiki_id = $_POST['wiki_id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $content = $_POST['content'];
                $time_to_read = $_POST['time_to_read'];
                $category_id = $_POST['category_id'];
                $new_wiki_tags_id = $_POST['tags'];

                // echo "<pre>";
                // var_dump($_POST);
                // echo "</pre>";
                // die;

                $wikiModel = new WikiModel();
                $success = $wikiModel->updateWiki($wiki_id, $title, $description, $content, $time_to_read, $category_id, $new_wiki_tags_id);

            }

            if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["id"])) {
                
                $target_wiki_id = $_GET['id'];

                $wikiModel = new WikiModel();
                $wiki = $wikiModel->findWiki($target_wiki_id);

            }

            // bring all categories
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->findAllCategories();
            // bring all tags
            $tagModel = new TagModel();
            $tags = $tagModel->findAllTags();

            require_once '../../Includes/head.php';
            require_once '../../Includes/nav.php';             
            require_once '../../views/User/write.php';
        }

        public function showWiki() {

            $target_wiki_id = $_GET['wiki_id'];

            $wikiModel = new WikiModel();
            $wiki = $wikiModel->findWiki($target_wiki_id);


            require_once '../../Includes/head.php';
            require_once '../../Includes/nav.php';             
            require_once '../../views/User/wiki.php';
        }

        public function deleteWiki() {

            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["id"])) {

                $target_wiki_id = base64_decode($_GET['id']);
                $wikiModel = new WikiModel();
                $success = $wikiModel->deleteWiki($target_wiki_id);
    
                header('location: profile');
            }
            
        }

        public function search() {

            $wikiModel = new WikiModel();

            if (isset($_GET['search-value'])) {
                $search_value = $_GET['search-value'];
                // bring all wikis
                $wikis = $wikiModel->searchWikis($search_value);

                if ($wikis) {
                    echo json_encode($wikis);
                } else {
                    echo json_encode(array());
                }
            }

            if (isset($_GET['category'])) {
                $search_value = $_GET['category'];
                // bring all wikis
                $wikis = $wikiModel->findAllWikisByCate($search_value);

                if ($wikis) {
                    echo json_encode($wikis);
                } else {
                    echo json_encode(array());
                }
            }
        }

        public function updateStatu() {
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    
                $rawData = file_get_contents("php://input");
                
                $data = json_decode($rawData, true);        
                
                $target_wiki_id = $data['id'];
                $new_statu = $data['wiki_statu'];

                $wikiModel = new WikiModel();
                $success = $wikiModel->updateStatu($target_wiki_id, $new_statu);

                echo json_encode($success);

            }
        }

    }