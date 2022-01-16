<?php
session_start();
include("../produk/koneksi.php");
if(isset($_COOKIE['login'])){
    if($_COOKIE['login'] == 'true'){
        $_SESSION['login'] = true ;
    }
}

if(isset($_SESSION["login"])){
    header("Location: ../admin.php");
    exit;
}
if(isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM login_tabel WHERE email = '$email'");

    // cek username
    if(mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){

            if(isset($_POST['login'])){
                setcookie('login','true',time() + 60);
            }
            echo"<script>alert('Login berhasil');
            window.location='../admin.php';</script>";
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="login.css">
    <title>Login Admin</title>
</head>
<body>
    <div class="main center">
        <div class="login center">
            
            <div class="user center">
                <i class='bx bx-user-circle'></i>
            </div>
            <form action="" method="POST">
            <?php if (isset($error)) : ?>
				<p style="color: red; font-style: italic;">Username / Password salah</p>
			<?php endif; ?>
            <div class="email center">
                <i class='bx bx-envelope' ></i>
                <input name="email" type="email" class="" placeholder="Enter Your Email">
            </div>
            <div class="password center">
                <i class='bx bxs-key' ></i>
                <input name="password" type="password" class="" placeholder="Enter Your Password">
            </div>
           
            <button name="login" class="log">Login</button>
            </form>
            <a href="register.php" class="reg">Daftar Terlebih Dahulu</a>
        </div>
            
    </div>
</body>
</html>