<?php
    namespace App\Models;
    use App\Config\DbConfig;
    use PDO;

    class CategoryModel
    {
        private $conn;

        public function __construct() {
            $dbConfig = new DbConfig();
            $this->conn = $dbConfig->getConnection();
        }

        public function findAllCategories() {
            $sql = "SELECT * FROM categorie";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        public function addCategory($new_category) {
            $sql = "INSERT INTO `categorie` (`name`) VALUES ('?')";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute([new_category]);

            return $success;
        }

        public function deleteCategory($category_target_id) {
            $sql = "DELETE FROM `categorie` WHERE id = $category_target_id";
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute();

            return $success;
        }
    }