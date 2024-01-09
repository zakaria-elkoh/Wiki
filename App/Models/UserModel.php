<?php

    namespace App\Models;
    use PDO;
    use App\Config\DbConfig;

class UserModel
{

    private $conn;

    public function __construct() {
        $dbConfig = new DbConfig();
        $this->conn = $dbConfig->getConnection();
    }

    public function isUserExist($user_name) {

        $sql = "SELECT COUNT(*) as count FROM user WHERE user_name = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_name]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($result[0]['count'] > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function signUp($first_name, $last_name, $user_name, $email, $password) {

        $role_id = 2;

        $sql = "INSERT INTO `user`(`first_name`, `last_name`, `user_name`, `email`, `role_id`, `password`) VALUES ( ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute([$first_name, $last_name, $user_name, $email, $role_id, $password]);

        return $success;
    }

    public function signIn($user_name, $password) {
        $sql = "SELECT * FROM `user` WHERE user_name = :user_name";
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute([':user_name'=>$user_name]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if(password_verify($password, $result['password'])) {
            return $result;
        } else {
            return false;
        }

    }

    public function findAllUsers() {
        $sql = "SELECT * FROM `user`";
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
