<?php
    class ProductQuery {
        public $pdo;

        public function __construct() {
            $this->pdo = connectDB();
        }

        public function __destruct() {
            $this->pdo = null;
        }

        public function all() {
            try {
                $sql = "SELECT * FROM product";
                $data = $this->pdo->query($sql)->fetchAll();
                $danhSach = [];
                foreach ($data as $row) {
                    // Chuyển đổi dữ liệu -> object Product
                    $danhSach[] = convertToObjProduct($row);
                }
                return $danhSach;
                
            } catch (Exception $e) { 
                echo "Lỗi: " .$e->getMessage();
                echo "<hr>";
            }
        }

        public function create(Product $product) {
            try {
                $sql = "INSERT INTO `product` (`id`, `name`, `price`, `quantity`, 
                `description`, `image_src`, `category_id`, `status`) 
                VALUES (NULL, '$product->name', '$product->price', '$product->quantity', 
                '$product->description', '$product->image_src', '$product->category_id', '$product->status');";
                
                $data = $this->pdo->exec($sql);
                // $data = 1 nếu thành công
                if ($data == 1) {
                    return "ok";
                } else {
                    return $data;
                }
            } catch (Exception $e) { 

            }
        }
    }
?>