<?php

    namespace App\Controller;
    use App\Models\UserModel;

    class UserController 
    {
        
        public function signUp() {
            
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["signup"])) {

                $user_name_error;
                $pass_error;

                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $user_name = $_POST['user_name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];
                
                if($confirm_password != $password) {
                    $pass_error = "The password do not matches";
                } else {
                    $user = new UserModel();
                    $isUserExist = $user->isUserExist($user_name);
                    
                    if($isUserExist) {
                        $user_name_error = "User name is already existed!";
                    } else {
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $user = new UserModel();
                        $user->signUp($first_name, $last_name, $user_name, $email, $hashed_password);

                        header('Location: signin');
                    }
                }

            }

            require_once  '../../Includes/head.php';
            require_once  '../../Includes/nav.php';
            require_once  '../../views/Auth/sign-up.php';
        }
        
        public function signIn() {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $pass_error;

                $user_name = $_POST['user_name'];
                $password = $_POST['password'];

                $user = new UserModel();
                $result = $user->signIn($user_name, $password);

                if(!$result) {
                    $pass_error = "Incorect password or user name";
                } else {
                    $_SESSION['user_id'] = $result['id'];
                    $_SESSION['user_name'] = $result['user_name'];
                    $_SESSION['user_role_id'] = $result['role_id'];
                    $_SESSION['first_name'] = $result['first_name'];
                    $_SESSION['last_name'] = $result['last_name'];
                    if($_SESSION['user_role_id'] === 1) {
                        header('Location: admin/dashboard');
                    } else {
                        header('Location: home');
                    }
                }
                
            }

            require_once  '../../Includes/head.php';
            require_once  '../../Includes/nav.php';
            require_once  '../../views/Auth/sign-in.php';
        }
        
        public function logOut() {
            $_SESSION = array();
            session_destroy();
            header('Location: signin');
        }

    }