<?php
    class LoginController {
        public $loginQuery;
        public $categoryQuery;

        public function __construct() {
            $this->loginQuery = new LoginQuery();
            $this->categoryQuery = new CategoryQuery();
        }

        public function __destruct() {}

        public function login() {
            // kiểm tra nếu người dùng nhấn nút login
            if(isset($_POST["submitLogin"])) {
                // var_dump($_POST);
                // lấy giá trị email và password từ ô nhập
                $email = trim($_POST["email"]);
                $password = trim($_POST["password"]);

                // gọi hàm kiểm tra đăng nhập
                $result = $this->loginQuery->checkLogin($email, $password);
                if ($result === 0) {
                    echo "Sai mật khẩu hoặc tài khoản";
                } else {
                    echo "đăng nhập thành công";
                    // lưu thông tin đăng nhập vào session

                    $_SESSION["user_name"] = $result->name;
                    $_SESSION["user_id"] = $result->id;
                    $_SESSION["user_role"] = $result->role;
                }
            }

            $listCategory = $this->categoryQuery->all();
            // hiển trị trang login
            include "view/login/login.php";
        }
    }

?>