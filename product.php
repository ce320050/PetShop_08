<?php 
require_once("db.php");
session_start();
$products = query("SELECT * FROM product");

?>
<!DOCTYPE html>
<html>
<head>
<?php include_once("head.php");?>
</head>
<body>
<?php include_once("header.php"); ?>

<div class="container" style="margin-top: 25px;">
  <div class="panel panel-default">
    <div class="panel-heading">Products</div>
      <div class="panel-body">
        <div class="row"> 
        <?php foreach ($products as $product) : ?>
  
          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-heading"><?= $product["nama_product"]; ?></div> <br>
              <div class="panel-body">
                <img src="product/<?= $product["gambar"];?>" style="width: 220px;height: 275px;">
              </div>
              <div class="panel-footer">
                <p style="color: black;font-size: 18px;"><b><?= $product["harga"]; ?></b>
                <!-- <button type="button" onclick="window.location = 'checkout.php';" class="btn btn-primary btn-md" style="float: right;"><span class="glyphicon glyphicon-shopping-cart"></span> Beli</button></p></div> -->
                <a href="cart.php?param=add&product=<?= $product["id"]?>" class="btn btn-primary">Beli</a>
                </p>
              </div>
            </div>
          </div>

        <?php endforeach; ?>

            </div>
          </div>
        </div> 
      </div>           
    </div>
  </div>
</div>

<?php require_once("footer.php")?>
<?php require_once("script.php")?>
</body>
</html>