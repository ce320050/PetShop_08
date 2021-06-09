<?php 
  session_start();
  require_once("db.php");
  if(isset($_SESSION["masuk"])){
    $token = $_SESSION['masuk'];
  }
?>

<!DOCTYPE html>
<html>
<head>
<?php include_once("head.php") ?>
</head>
<body>
  <?php include_once("header.php"); ?>
  <marquee class="mt-5" behavior="" direction=""><h1>Selamat Datang di Petshop Dr.Gifson Sirait</h1></marquee>
  
  <div class="jumbotron">
    <div class="container">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="img/2.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/ajgg.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/kucing.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
      </div>
    </div>

<div class="container mt-3">
  <div class="jumbotron">
  <h1>What Is PetShop</h1>
  <p>Pet shop merupakan salah satu tempat untuk mengadopsi atau menjual hewan peliharaan beserta perlengkapan untuk pemeliharaan hewan.
    Petshop Dr Gibran ini dibuat agar masyarakat sekitar Balige bisa membaca terlebih dahulu pada website ini sebelum ke toko offline atau website ini dibuat agar mempermudah masyarakat dalam proses pembelian atau booking-an.
    Dari segi kualitas product-product yang dijual di petshop Dr Gibran tidak diragukan,sebab product yang dijual adalah product bagus yang direkomendasikan untuk hewan.
    Dari segi pelayanan,pelayanan nya sangat baik dan profesional sehingga dalam perkerjaanya terampil dan tidak mengecewakan.</p>
  <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">About PetCare</button>
  <div id="demo" class="collapse">
    <ul>
      <br>
      <h4>Service atau layanan yang tersedia : </h4>
      <li>Service atau pelayanan yang tersedia </li>
      <li>Vaksinasi atau biasa disebut HMR yaitu hewan yang bisa menularkan rabies maka vaksinasi ini berfungsi untuk tidak terkena rabies
            <p>Vaksin: Rp.100.000 / tahun (anjing biasa)</p>
            <p>Vaksin untuk anjing </p>
            <p>Vaksin kucing, kera </p>
      </li>
      <li>Penitipan hewan (Rp.80.000-100.000 /hari)</li>
      <li>Pengobatan atau terapi (penyakit kulit)</li>
    </ul>
  </div> 
</div>
</div>
    <?php require_once("footer.php")?>
    <?php require_once("script.php")?>
</body>
</html>
