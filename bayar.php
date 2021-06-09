<?php 
require_once("db.php");
session_start();

if(!$_SESSION["masuk"]){
    header("Location: login1.php");
    exit;
}
$token = $_SESSION['masuk'];

if(isset($_POST["submit"])){
    $id_transaksi = $_POST["id_transaksi"];
    $name = $_POST["name"];
    $alamat = $_POST["address"];
    $phone = $_POST["phone"];
    $payment = $_POST["payment"];
    
    $transaksi = mysqli_query($conn,"INSERT INTO metode_pembayaran 
                        VALUES ('','$name','$alamat','$phone','$payment')");
    $get_tr = query("SELECT * FROM metode_transaksi ORDER BY id_transaksi DESC");
    foreach($get_tr AS $get_tr);
    
    $tr = $get_tr['id_transaksi'];
    $items = query("SELECT * FROM keranjang INNER JOIN product ON product.id=keranjang.fid_product WHERE fid_user = $token");
    foreach($items AS $item){
        $id = $item['id'];
        $nama = $item['nama_product'];
        $harga = str_replace(".","",$item['harga']);
        $qty = $item['qty'];
        $subtotal = $harga * $qty;

        mysqli_query($conn,"
        INSERT INTO transaksi_detail SET
        id_transaksi = '$tr',
        id_product = '$id',
        nama_product = '$nama',
        harga = '$harga',
        qty = '$qty',
        subtotal = '$subtotal'
        ");

        mysqli_query($conn,"
        DELETE FROM keranjang WHERE
        fid_user = '$token'
        ");
    }
    header("Location: product.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/css/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
</head>
<body>

<form class="form" method="post">
<center> <h1>Form Pembayaran</h1> </center>
    <input type="hidden" name="id_transaksi" value="<?= $id; ?>">
    <div class="card-body">
        <div class="form-group">
        <label>Nama lengkap:</label>
        <input type="text" class="form-control" name="name" placeholder="Masukan nama lengkap anda" required/>
        </div>

        <div class="separator separator-dashed my-5"></div>

        <div class="form-group">
        <label>Alamat :</label>
        <input type="text" class="form-control" name="address" placeholder="Masukan alamat anda" required/>
        </div>

        <div class="separator separator-dashed my-5"></div>

        <div class="form-group">
        <label>No telepon :</label>
        <input type="number" name="phone" class="form-control" placeholder="Masukan nomor hp anda" min="8" required/>
        </div>

        <div class="separator separator-dashed my-5"></div>

        <div class="form-group">
        <label>Jenis pembayaran:</label>
        <div class="checkbox-list bg-white">
            <label class="checkbox">
            <input type="radio" name="payment" value="atm" class="mb-5" checked/>
            <span></span>Atm
            </label>
            <img src="logo/atm.jpg" style="width:80px;" alt="">
                
            <label class="checkbox mt-5">
            <input type="radio" name="payment" class="mt-5" value="tunai"/>
            <span></span>Tunai
            </label>
            <img src="logo/tunai.png" style="width:80px;" alt="">
        </div>
        </div>
    </div>
 <div class="card-footer">
  <button type="submit" name="submit" onclick="alert('Berhasil membeli');"  class="btn btn-primary mr-2">Proses</button>
  <button type="reset" class="btn btn-secondary" onclick="window.location = 'product.php';">Cancel</button>
 </div>
</form>
<script src="assets/js/plugins.bundle.js"></script>
<script src="assets/js/prismjs.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
</body>
</html>