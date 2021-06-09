<?php
session_start();
if(!$_SESSION["masuk"]){
    header("Location: login1.php");
    exit;
}
$token = $_SESSION['masuk'];
require_once("db.php");
$param = $_GET['param'];
$product = $_GET['product'];

$items = query("SELECT * FROM keranjang WHERE fid_user = $token");

if($param == "add"){
    $cek_keranjang = mysqli_query($conn,"SELECT * FROM keranjang WHERE fid_user = $token AND fid_product = $product");
    $count_keranjang = mysqli_num_rows($cek_keranjang);
    if($count_keranjang>0){
        mysqli_query($conn,"
        UPDATE keranjang SET
        qty = qty+1
        WHERE
        fid_user = '$token'
        AND
        fid_product = '$product'
        ");
        echo "<script>
        alert('Keranjang berhasil di update');
        window.location.href = 'product.php';
        </script>";
    }else{
        mysqli_query($conn,"
        INSERT INTO keranjang SET
        fid_user = '$token',
        fid_product = '$product',
        qty = 1
        ");
        echo "<script>
        alert('Berhasil menambah ke keranjang');
        window.location.href = 'product.php';
        </script>";
    }
}else{
    mysqli_query($conn,"
    DELETE FROM keranjang WHERE
    fid_user = '$token'
    ");
    echo "<script>
    alert('Keranjang berhasil di kosongkan');
    window.location.href = 'product.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
</body>
</html>