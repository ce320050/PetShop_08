<?php 

require_once("db.php");
session_start();

if (isset ($_POST["login"]) ) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hasil = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    /// Cek username 
    if ( mysqli_num_rows($hasil) === 1) {
        
        /// Cek password
            $result = mysqli_fetch_row($hasil);
            $_SESSION["masuk"] = $result[0];
            header("Location: home.php");
        }
        $error = true; 
    }

    if (isset($_SESSION["masuk"]) ) {
        header("Location: home.php");
        exit();
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/dark.css">
    <link rel="stylesheet" href="css/font-icons.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="auth.css">
    <link rel="stylesheet" href="semicolon/css/bootstrap.css">
</head>
<body>
    
<div class="content-wrap">

    <div class="container clearfix">

        <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

            <div class="tab-container">

            <div class="tab-content clearfix" id="tab-login">
                    <div class="card nobottommargin">
                        <div class="card-body bg-dark" style="padding: 40px;">
                            <form id="login-form" name="login-form" class="nobottommargin" method="post">
                            <?php if( isset($error) ) : ?>
                                <p style="color:red; font-style:italic;">Username atau password salah</p>
                            <?php endif; ?>
                                <h3 class="text-white">Login</h3>

                                <div class="col_full">
                                    <label for="username" class="text-white">Username:</label>
                                    <input type="text" id="lusername" name="username" value="" class="form-control" placeholder="Username"/>
                                </div>

                                <div class="col_full">
                                    <label for="password" class="text-white">Password:</label>
                                    <input type="password" id="lpassword" name="password" value="" class="form-control" placeholder="Password" />
                                </div>

                                <div class="col_full nobottommargin">
                                    <button class="button button-3d button-black nomargin" id="login" name="login" value="login">Login</button>
                                    <a href="register.php" class="btn btn-info">Registrasi</a>                                
                                </div>
                                <br>

                            </form>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>

    </div>

</div>

<script src="js/functions.js"></script>
<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
</body>
</html>