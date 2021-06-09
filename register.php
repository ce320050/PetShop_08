<?php 

require_once("db.php");

function registrasi_user($data) {
    global $conn;

    $username = strtolower( stripslashes(htmlspecialchars( $data["username"])) );
    $email = strtolower( stripslashes(htmlspecialchars( $data["email"])) );
    $password = mysqli_real_escape_string ( $conn, htmlspecialchars( $data["password"]));
    $password2 = mysqli_real_escape_string ($conn, htmlspecialchars( $data["cpassword"]));

    /// cek username gaboleh duplikat
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if ( mysqli_fetch_assoc ( $result ) ) {
        echo "<script>
            alert('Username sudah terdaftar, cari username lain!')
            </script>";
        return false;
    }

    if (empty($username)) {
        echo "<script>
        alert('Masukin Username yang bener!!');
        </script>";  return false;
    } else if (strlen($username) < 8) {
        echo "<script>
        alert('Username minimum 8 karakter!!');
        </script>"; return false;
    } 
    else if (empty($email)) {
        echo "<script>
        alert('Email harus di isi');
        </script>"; return false;
    } else if (empty($password)) {
        echo "<script>
        alert('Masukin Password yang bener!!');
        </script>"; return false;
    } else if (strlen($password) < 8) {
        echo "<script>
        alert('Password minimum 8 karakter!!');
        </script>"; return false;
    } else if ( $password != $password2 ) { 
          /// Cek password konfirmasi
            echo "<script>
                alert('Password konfirmasi tidak sama')
                </script>";
                return false;
        } else{
        /// Tambah user baru
        mysqli_query($conn, "INSERT INTO users VALUES('','$username','$email','$password')" );

        return mysqli_affected_rows($conn); 
        }
}

if ( isset($_POST["register"]) ) {
    if ( registrasi_user($_POST) > 0 ) {
        echo "<script>
        window.alert('Berhasil registrasi');
        window.location.href='login1.php';
            </script>";
    } else {
    echo mysqli_error($conn);
    }
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

            <div class="tab-content clearfix" id="tab-register">
                    <div class="card nobottommargin">
                        <div class="card-body bg-dark" style="padding: 40px;">
                            <h3 class="text-white">Daftar</h3>

                            <form id="register-form" name="register-form" class="nobottommargin" method="post">

                                <div class="col_full">
                                    <label for="username1" class="text-white">Username:</label>
                                    <input type="text" id="username1" name="username" class="form-control" placeholder="Username" required autofocus autocomplete="off"/>
                                </div>

                                
                                <div class="col_full">
                                    <label for="email" class="text-white">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" required autofocus autocomplete="off"> 
                                </div>

                                <div class="col_full">
                                    <label for="password1" class="text-white">Password:</label>
                                    <input type="password" id="password1" name="password" class="form-control" placeholder="Password" required autofocus autocomplete="off" />
                                </div>

                                <div class="col_full">
                                    <label for="cpassword" class="text-white">Masukan Password kembali:</label>
                                    <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Konfirmasi password" required autofocus autocomplete="off" />
                                </div>

                                <div class="col_full nobottommargin">
                                    <button class="button button-3d button-black nomargin" id="submit" name="register" value="Daftar">Daftar</button>
                                    <a class="button button-3d button-info nomargin" href="login1.php">Login disini</a>
                                </div>

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