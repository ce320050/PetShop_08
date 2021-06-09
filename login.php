<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, intial-scale=1">
    <title>Login | Petshop</title>
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/dark.css">
    <link rel="stylesheet" href="css/font-icons.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="auth.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body id="bg-login">
    <div class="box.login">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <input type="submit" name="submit" placeholder="Login">
        </form>
        <?php
            if(isset($_POST['submit'])){
                session_start();
                include 'db.php';

                $user = $_POST['user'];
                $pass = $_POST['pass'];

                $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".MD5($pass)."'");
                if(mysqli_num_rows($cek) > 0){
                    $d = mysqli_fetch_object($cek);
                    $_SESSION['status_login'] = true;
                    $_SESSION['admin_global'] = $d;
                    $_SESSION['id'] = $id->admin_id;
                    echo '<script>window.location="home.php"</script>';
                }else{
                    echo '<script>alert("Username atau password anda salah!")</script>';
                }
                }
        ?>
    </div>
</body>
</html>