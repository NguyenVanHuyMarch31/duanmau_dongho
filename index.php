<?php
session_start();
// Nhúng tất cả các file common
require_once 'common/env.php';
require_once 'common/function.php';

// Nhúng toàn bộ các file Controller
require_once 'controller/HomeController.php';
require_once 'controller/LoginController.php';

// Nhúng toàn bộ các file model
require_once 'admin/model/Product.php';
require_once 'admin/model/Category.php';
require_once 'admin/model/CategoryQuery.php';
require_once 'model/ProductQuery.php';
require_once 'model/Account.php';
require_once 'model/LoginQuery.php';

// Thông tin act và id trên đường dẫn
$act = $_GET['act'] ?? '';
$id = $_GET['id'] ?? '';
// Tạo session lưu trữ thông tin tk đăng nhập

match ($act) {
    // Trang chủ
    '' => (new HomeController()) -> home(),
    'login' => (new LoginController()) -> login(),
    'addToCart' => (new HomeController()) -> addToCart(),
}
?>