<?php
    namespace App\Controller;
    use App\Models\WikiModel;
    use App\Models\CategoryModel;

    class HomeController
    {
        public function index() {
            // bring all wikis
            $wikiModel = new WikiModel();
            $wikis = $wikiModel->findAllWikis();
            // bring all cotegories
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->findAllCategories();
            
            require_once  '../../Includes/head.php';
            require_once  '../../Includes/nav.php';
            require_once  '../../views/index.php';
            require_once  '../../Includes/footer.php';
        }

    }