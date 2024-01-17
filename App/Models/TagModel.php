<?php
    namespace App\Models;
    use App\Config\DbConfig;
    use PDO;

    class TagModel
    {
        private $conn;

        public function __construct() {
            $dbConfig = new DbConfig();
            $this->conn = $dbConfig->getConnection();
        }

        public function findAllTags() {
            $sql = "SELECT * FROM tag";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        public function addTag($new_tag) {
            $sql = "INSERT INTO `tag`(`name`) VALUES (?)";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([$new_tag]);

            return $success;
        }

        public function updateTag($new_value, $tag_target_id) {
            $sql = "UPDATE `tag` SET `name` = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([$new_value, $tag_target_id]);

            return $success;
        }

        public function deleteTag($tag_target_id) {
            $sql = "DELETE FROM `tag` WHERE id = $tag_target_id";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute();

            return $success;
        }

        public function totalTags() {
            $sql = "SELECT COUNT(*) as count FROM tag";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $result['count'];
    
            return $total;
        }
    }