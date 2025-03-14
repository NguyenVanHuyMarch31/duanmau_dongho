<?php
    class CategoryQuery {
        public $pdo;

        public function __construct() {
            $this->pdo = connectDB();
        }

        public function _destruct() { 
            $this->pdo = null;
        }

        public function all() {
            try {
                $sql = "SELECT * FROM category";
                $data = $this->pdo->query($sql)->fetchAll();
                // chuyển dữ liệu -> object Category
                $listCategory = [];
                foreach ($data as $row) {
                    $category = convertToObjCategory($row);
                    $listCategory[] = $category;
                }
                return $listCategory;
            } catch(Exception $e) { }
        }
    }
?>