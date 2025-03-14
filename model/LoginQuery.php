<?php
    class LoginQuery {
        public $pdo;

        public function __construct() {
            $this->pdo = connectDB();
        }
        public function __destruct() {}

        public function checkLogin($email, $password) {
            try {
                $sql = "SELECT * FROM `account` WHERE email = '$email' and password = '$password';";
                $data = $this->pdo->query($sql)->fetch();
                // không có dữ liệu $data = false;
                if ($data === false) { 
                    return 0;
                } else {
                    // chuyển đổi thành -> object Account
                    $account = new Account();
                    $account->id = $data['id'];
                    $account->email = $data['email'];
                    $account->password = $data['password'];
                    $account->role = $data['role'];
                    $account->name = $data['name'];
                    return $account;
                }
            } catch(Exception $e) {}
        }
    }
?>