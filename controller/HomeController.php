<?php
    class HomeController {
        public $productQuery;
        public $categoryQuery;
        
        public function __construct() {
            $this->productQuery = new ProductQuery();
            $this->categoryQuery = new CategoryQuery();
        } 
        public function __destruct() {}

        public function home() {
            // gọi tới lớp model lấy dữ liệu tương ứng
            $listProductLatest = $this->productQuery->getTop8ProductLatest();
            $listCategory = $this->categoryQuery->all();
            // hiển thị view trang chu
            include "view/home.php";
        }

        public function addToCart() {
            if (isset($_POST["add2Cart"]) && $_POST["id"] >0 ) {
                // thêm sản phẩm vào $_SESSION giỏ hàng
                $id = $_POST["id"];
                $quantity = $_POST["quantity"];
                $product = $this->productQuery->find($id);
                $total = $quantity * $product->price;
                // chèn thông tin sản phẩm vào giỏ hàng trong session
                $array_pro = [
                    "image_src" => $product->image_src,
                    "name" => $product->name,
                    "price" => $product->price, 
                    "quantity" =>$quantity, 
                    "total" => $total
                ];
                array_push($_SESSION["myCart"],$array_pro);
                // echo "<pre>";
                // print_r($_SESSION["myCart"]);
            }
            $listCategory = $this->categoryQuery->all();
            include "view/cart.php";
        }
    }
?>