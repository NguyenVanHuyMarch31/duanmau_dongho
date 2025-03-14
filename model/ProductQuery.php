<?php
    class ProductQuery {
        public $pdo;

        public function __construct() {
            $this->pdo = connectDB();
        }

        public function __destruct() {
            $this->pdo = null;
        }

        // Lấy top 8 sản phẩm mới nhất
        public function getTop8ProductLatest() {
            try {
                $sql = "SELECT * FROM product ORDER BY id DESC LIMIT 8";
                $data = $this->pdo->query($sql)->fetchAll();
                // chuyển đổi dữ liệu ->object product
                $ds = [];
                foreach ($data as $row) {
                    $product = convertToObjProduct($row);
                    $ds[] = $product;
                }
                return $ds;
            } catch (Exception $e) { 
                echo "Lỗi: " . $e->getMessage();
                echo "<hr>";
            }
        }

        public function find($id) {
            try {
                $sql = "SELECT * FROM product WHERE id = $id";
                $data = $this->pdo->query($sql)->fetch();
                // $data = 1 nếu thành công
                $product = convertToObjProduct($data);
                return $product;
            } catch (Exception $e) { 

            }
        }

    }
?>