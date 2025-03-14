<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/be9ed8669f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include "view/component/header.php";?>
    <!-- END HEADER -->
    <!-- CONTENT -->
    <main class="container">
        <!-- Main content -->
        <div class="shadow bg-light mt-4 ms-4 mb-4 p-4">
            <!-- Slide -->
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="<?= BASE_URL. 'img/slide 1.jpg' ?>" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="<?= BASE_URL. 'img/slide2.jpg' ?>" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            <!-- End slide -->
            <!-- Sản phẩm bán chạy -->
            <h3 class="mt-3">Sản phẩm mới nhất</h3>
            <hr>
            <div class="row">
                <?php foreach ($listProductLatest as $product) : ?>
                    <!-- Box sản phẩm -->
                    <div class="col-3">
                        <div class="border rounded-3 mb-3 overflow-hidden">
                            <!-- ẢNh -->
                            <!-- Hiển thị ảnh dạng nâng cao -->
                            <div class="bg-danger ratio-1x1">
                                <img src="<?= BASE_URL. $product->image_src ?>" alt="" class="mw-100 mh-100">
                            </div>
                            <!-- Text và button -->
                            <div class="p-2">
                                <h5><?= $product->name ?></h5>
                                <div class="d-flex justify-content-between">
                                    <span class="text-danger text-decoration-line-through">200.000 VND</span>
                                    <span class="fw-bold"><?= $product->price ?></span>
                                </div>
              
                                  <form action="?act=addToCart" method="POST">
                                      <input type="hidden" name="id" value="<?= $product->id?>">
                                      <input type="hidden" name="quantity" value="1">
                                      <button class="btn btn-danger rounded-pill w-100 btn-sm mt-1" name="add2Cart">
                                        Mua ngay
                                   </form>
                            </div>
                        </div> 
                    </div>  
                    <!-- Hết box sản phẩm -->
                <?php endforeach; ?>
            </div>  
            <!-- Hết sản phẩm -->
        </div>
        <!-- End main content -->
    </main>
    <!-- FOOTER -->
    <?php include "view/component/footer.php";?>
    <!-- END FOOTER -->
</body>
</html>