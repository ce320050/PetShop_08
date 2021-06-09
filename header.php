<?php
require_once("db.php");
$token= '';
if(isset($_SESSION["masuk"])){
  $token = $_SESSION['masuk'];
}

$items = mysqli_query($conn, "SELECT * FROM keranjang INNER JOIN product ON product.id=keranjang.fid_product WHERE fid_user = $token");
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link mr-6" aria-current="page" href="home.php">Home</a>
        <a class="nav-link mr-6" href="product.php">Product</a>
        <a class="nav-link mr-6" href="galery.php">Galery</a>
        <a class="nav-link mr-6" href="about.php">About Petshop</a>
        <a class="nav-link mr-6" href="about-us.php">About Us</a>
        <?php if(!isset($_SESSION["masuk"])) : ?>
        <a class="nav-link" href="login1.php">Login</a>
        <?php else: ?>
        <?php endif; ?>
        <?php if(isset($_SESSION["masuk"])) : ?>
          <a class="nav-link" href="logout.php">Logout</a>
          <?php else: ?>
        <?php endif; ?>
      </div>
    </div>
      <!-- Top Cart
						============================================= -->
						<div id="top-cart" class="justify-content-end">
							<a href="#" id="top-cart-trigger">
              <div class="keranjang" style="font-size:2em;">
                <i class="icon-shopping-cart" style="width:48px;color:black"></i>
                <span></span>
              </div>
              </a>
							<div class="top-cart-content">
								<div class="top-cart-title">
									<h4>Shopping Cart</h4>
								</div>
								<div class="top-cart-items">
                  <?php 
                  $total = 0;
                  foreach($items as $item):
                    $total += str_replace('.','',$item["harga"]) * $item["qty"];
                    ?>
                    <div class="top-cart-item clearfix">
                      <div class="top-cart-item-image">
                        <a href=""><img src="product/<?= $item["gambar"];?>" alt="Blue Round-Neck Tshirt" /></a>
                      </div>
                      <div class="top-cart-item-desc">
                        <a href="#"><?= $item["nama_product"]; ?></a>
                        <span class="top-cart-item-price">Rp.<?=$item["harga"];  ?></span>
                        <span class="top-cart-item-quantity">x <?= $item["qty"]; ?></span>
                      </div>
                    </div>
                  <?php endforeach; ?>
								<div class="top-cart-action clearfix">
									<span class="fleft top-checkout-price"><?= number_format($total); ?></span>
									<a href="bayar.php" class="button button-3d button-small nomargin fright" >Bayar! </a>
                  <a href="cart.php?param=hapus" class="btn btn-danger">Hapus</a>
								</div>
							</div>
						</div><!-- #top-cart end -->
  </div>
</nav>