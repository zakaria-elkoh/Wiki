<?php
    namespace App\Models;
    use App\Config\DbConfig;
    use PDO;

    class WikiModel
    {

        private $conn;

        public function __construct() {
            $dbConfig = new DbConfig();
            $this->conn = $dbConfig->getConnection();
        }

        public function findWiki($target_wiki_id) {

            $sql = "SELECT * FROM wiki WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([$target_wiki_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $result;
        }

        public function findAllWikis($search_value = '') {

            $sql = "SELECT wiki.*, user_name, first_name, last_name FROM `wiki` INNER JOIN categorie ON wiki.categorie_id = categorie.id INNER JOIN user ON wiki.user_id = user.id WHERE title LIKE ? ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $search_value = '%' . $search_value . '%';
            $success = $stmt->execute([$search_value]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $result;
        }

        public function createWiki($title, $description, $content, $time_to_read, $category_id, $new_wiki_tags_id) {

            $created_at = date("Y/m/d");

            $sql = "INSERT INTO `wiki`(`title`, `image`, `description`, `content`, `read_time`, `categorie_id`, `created_at`) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([$title, 'an image', $description, $content, $time_to_read, $category_id, $created_at]);
            $wiki_id = $this->conn->lastInsertId();

            if($success) {
                foreach ($new_wiki_tags_id as $tag_id) {
                    $sql = "INSERT INTO `wiki_tag`(`Wiki_id`, `Tag_id`) VALUES (?, ?)";
                    $stmt = $this->conn->prepare($sql);
                    $success = $stmt->execute([$wiki_id, $tag_id]);
                }
            }
    
            return $success;
        }

        public function updateWiki($title, $description, $content, $time_to_read, $category) {
            $sql = "UPDATE `wiki` SET `title`= '?',`image`= '?',`description`= '?',`content`= '?',`read_time`= '?',`categorie_id` ='?' WHERE 1";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([$title, 'an image', $description, $content, $time_to_read, $category_id]);
    
            return $success;
        }

        public function updateStatu($target_wiki_id, $new_statu) {
            $sql = "UPDATE `wiki` SET `statu` = ? WHERE id = ? ";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([$new_statu, $target_wiki_id]);
    
            return $success;
        }

        public function deleteWiki($target_wiki_id) {
            $sql = "DELETE FROM `wiki` WHERE ?";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([$target_wiki_id]);
    
            return $success;
        }
    }