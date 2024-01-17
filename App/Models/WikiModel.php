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

            $sql = "SELECT wiki.*, user_name, first_name, last_name, GROUP_CONCAT(tag.name) as tags 
            FROM `wiki` 
            LEFT JOIN categorie ON wiki.categorie_id = categorie.id 
            LEFT JOIN user ON wiki.user_id = user.id 
            LEFT JOIN wiki_tag ON wiki_tag.Wiki_id = wiki.id 
            LEFT JOIN tag ON wiki_tag.Tag_id = tag.id  
            WHERE wiki.id = ? && statu != 'archive'
            GROUP BY wiki.id";

            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([$target_wiki_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $result;
        }

        public function allByUserId($user_id) {

            $sql = "SELECT wiki.*, user_name, first_name, last_name FROM `wiki` INNER JOIN categorie ON wiki.categorie_id = categorie.id INNER JOIN user ON wiki.user_id = user.id WHERE user_id = ? && statu != 'archive' ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([$user_id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $result;
        }

        public function findAllWikis() {

            $sql = "SELECT wiki.*, categorie.name as category, user_name, first_name, last_name, GROUP_CONCAT(tag.name) as tags 
            FROM `wiki` 
            LEFT JOIN categorie ON wiki.categorie_id = categorie.id 
            LEFT JOIN user ON wiki.user_id = user.id 
            LEFT JOIN wiki_tag ON wiki_tag.Wiki_id = wiki.id 
            LEFT JOIN tag ON wiki_tag.Tag_id = tag.id
            GROUP BY wiki.id
            ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $result;
        }

        public function searchWikis($search_value = '') {

            $sql = "SELECT wiki.*, user_name, first_name, last_name, GROUP_CONCAT(tag.name) as tags 
            FROM `wiki` 
            LEFT JOIN categorie ON wiki.categorie_id = categorie.id 
            LEFT JOIN user ON wiki.user_id = user.id 
            LEFT JOIN wiki_tag ON wiki_tag.Wiki_id = wiki.id 
            LEFT JOIN tag ON wiki_tag.Tag_id = tag.id  
            WHERE (title LIKE ? OR tag.name LIKE ?) && statu != 'archive'
            GROUP BY wiki.id
            ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $search_value = '%' . $search_value . '%';
            $success = $stmt->execute([$search_value, $search_value]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $result;
        }

        public function findAllWikisByCate($search_value) {

            $sql = "SELECT wiki.*, categorie.name as category, user_name, first_name, last_name FROM `wiki` 
            INNER JOIN categorie ON wiki.categorie_id = categorie.id 
            INNER JOIN user ON wiki.user_id = user.id 
            WHERE categorie.name LIKE ? && statu != 'archive'
            ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $search_value = '%' . $search_value . '%';
            $success = $stmt->execute([$search_value]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $result;
        }

        public function createWiki($title, $description, $content, $time_to_read, $category_id, $new_wiki_tags_id, $user_id, $statu) {

            $created_at = date("Y/m/d");

            $sql = "INSERT INTO `wiki`(`title`, `image`, `description`, `content`, `read_time`, `categorie_id`, `created_at`, `user_id`, `statu`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([$title, 'an image', $description, $content, $time_to_read, $category_id, $created_at, $user_id, $statu]);
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

        public function updateWiki($wiki_id, $title, $description, $content, $time_to_read, $category_id, $new_wiki_tags_id) {
            $sql = "UPDATE `wiki` SET `title`= ?,`image`= ?,`description`= ?,`content`= ?,`read_time`= ?,`categorie_id` = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([$title, 'an image', $description, $content, $time_to_read, $category_id, $wiki_id]);

            if($success) {
                // delete all the tags for a wiki
                $sql = "DELETE FROM `wiki_tag` WHERE wiki_id = ?";
                $stmt = $this->conn->prepare($sql);
                $success = $stmt->execute([$wiki_id]);

                // insert all the tags for a wiki
                foreach ($new_wiki_tags_id as $tag_id) {
                    $sql = "INSERT INTO `wiki_tag`(`Wiki_id`, `Tag_id`) VALUES (?, ?)";
                    $stmt = $this->conn->prepare($sql);
                    $success = $stmt->execute([$wiki_id, $tag_id]);
                }
            }
    
            return $success;
        }

        public function updateStatu($target_wiki_id, $new_statu) {
            $sql = "UPDATE `wiki` SET `statu` = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([$new_statu, $target_wiki_id]);
    
            return $success;
        }

        public function deleteWiki($target_wiki_id) {
            $sql = "DELETE FROM `wiki` WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([$target_wiki_id]);
    
            return $success;
        }

        public function totalWikis() {
            $sql = "SELECT COUNT(*) as count FROM wiki";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $result['count'];
    
            return $total;
        }
    }