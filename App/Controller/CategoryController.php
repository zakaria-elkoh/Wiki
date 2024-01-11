<?php
    namespace App\Controller;
    use App\Models\CategoryModel;

    class CategoryController 
    {

            public function updateCategory() {
                
                if($_SERVER['REQUEST_METHOD'] === 'POST') {
                    
                    $rawData = file_get_contents("php://input");
                    
                    $data = json_decode($rawData, true);
                    
                    $new_value = $data['new_value'];
                    $tag_target_id = $data['id'];
                    
                    $categoryModel = new CategoryModel();
                    $success = $categoryModel->updateCategory($new_value, $tag_target_id);

                    echo json_encode($success);
                }
        }
    }