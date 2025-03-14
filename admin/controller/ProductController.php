<?php
    class ProductController {

        public $productQuery;
        public $categoryQuery;

        public function __construct() {
            $this->productQuery = new ProductQuery();
            $this->categoryQuery = new CategoryQuery();
        }
        public function __destruct() {
        }

        public function list() {
            // Gọi model lấy danh sách sản phẩm
            $danhSachSp = $this->productQuery->all();
            // hiển thị view tương ứng
            include 'view/product/list.php';
        }

        public function create() {
            // echo 'create';
            // Xử lý logic gọi phương thức create() trong productQuery
            // 1. Thay đổi name các ô input trong view -> lấy được giá trị khi nhấn nút tạo mới
            // 2. Gọi phương thức create()
            if(isset($_POST["submitFormCreatePro"])) {
                echo "<pre>";
                print_r($_POST);
                // chuyển đổi giá trị các ô nhập -> thuộc tính của object
                $product = new Product();
                $product->name = trim($_POST["name"]);
                $product->price = trim($_POST["price"]);
                $product->description = trim($_POST["description"]);
                $product->quantity = trim($_POST["quantity"]);
                $product->category_id = trim($_POST["category_id"]);
                $product->status = trim($_POST["status"]);
                $product->image_src = "";

                // Xử lý ảnh
                if (isset($_FILES["image_upload"]) && $_FILES["image_upload"]["tmp_name"] !== "") {
                    $img = $_FILES["image_upload"]["tmp_name"];
                    $vi_tri = "../img/san-pham/" . $_FILES["image_upload"]["name"];
                    if (move_uploaded_file($img, $vi_tri)) { 
                        echo "Upload img thành công";
                        $product->image_src = 'img/san-pham/'. $_FILES["image_upload"]["name"];
                    } else {
                        echo "Upload img thất bại";
                    }
                }
                
                // call hàm create() trong ProductQuery
                $result = $this->productQuery->create($product);
                if ($result == "ok") {
                    // quay về trang danh sách
                    header("Location: ?act=list-pro");
                } else {
                    echo "Tạo mới sản phẩm thất bại. Mời nhập lại";
                }
            }
            // Lấy danh sách danh mục hiển thị trên view create product
            $listCategory = $this->categoryQuery->all();
            include "view/product/create.php";
        }
    }
?>