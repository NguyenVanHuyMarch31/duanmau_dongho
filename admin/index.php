<?php
    session_start();
    // 1. Nhúng tất cả các file cần dùng vào đây
    // File common
    require_once "../common/env.php";
    require_once "../common/function.php";

    // nhúng toàn bộ file trong controller
    require_once "controller/ProductController.php";
    require_once "controller/CategoryController.php";

    // Nhúng toàn bộ file trong model
    require_once "model/Product.php";
    require_once "model/Category.php";
    require_once "model/ProductQuery.php";
    require_once "model/CategoryQuery.php";

    // Người dùng hệ thống tương tác website bằng url
    // => tham số act trên url để hệ thống phân biệt mong muốn người dùng muốn truy cập tới trang nào
    $act = $_GET["act"] ?? "";
    $id = $_GET["id"] ?? "";

    // Kiểm tra người dùng có đăng nhập và role= 1
    if (isset($_SESSION["user_name"]) && isset($_SESSION["user_id"]) && $_SESSION["user_role"] === 1) {
        // Kiểm tra giá trị act để gọi phương thức tương ứng trong Controller tương ứng
        // Có thể dùng switch-case
        match($act) {
            '' => (new ProductController()) -> list(),
            'list-pro' => (new ProductController()) -> list(),
            'create-pro' => (new ProductController()) -> create()
        };
    } else {
        echo "<script>";
        echo "alert('Bạn không có quyền truy cập trang quản trị');";
        echo "</script>";
        header("Location: ../index.php");
    }


?>