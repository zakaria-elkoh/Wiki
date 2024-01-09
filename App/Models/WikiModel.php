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

        public function findAllWikis() {

            $sql = "SELECT * FROM `wiki`";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $result;
        }

        public function createWiki($title, $description, $content, $time_to_read, $category_id) {

            $created_at = date("Y/m/d");

            $sql = "INSERT INTO `wiki`(`title`, `image`, `description`, `content`, `read_time`, `categorie_id`, `created_at`) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([$title, 'an image', $description, $content, $time_to_read, $category_id, $created_at]);
    
            return $success;
        }

        public function updateWiki($title, $description, $content, $time_to_read, $category) {
            $sql = "UPDATE `wiki` SET `title`= '?',`image`= '?',`description`= '?',`content`= '?',`read_time`= '?',`categorie_id` ='?' WHERE 1";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([$title, 'an image', $description, $content, $time_to_read, $category_id]);
    
            return $success;
        }

        public function deleteWiki($target_wiki_id) {
            $sql = "DELETE FROM `wiki` WHERE ?";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([$target_wiki_id]);
    
            return $success;
        }
    }