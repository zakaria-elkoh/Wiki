<?php
    namespace App\Controller;
    use App\Models\TagModel;

    class TagController 
    {

        public function updateTag() {

            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $rawData = file_get_contents("php://input");
                
                $data = json_decode($rawData, true);
                
                $new_value = $data['new_value'];
                $tag_target_id = $data['id'];

                $tagModel = new TagModel();
                $success = $tagModel->updateTag($new_value, $tag_target_id);

                echo json_encode($success);
            }

        }
    }

