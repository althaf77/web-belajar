<?php include("../produk/koneksi.php");
if(isset($_POST["daftar"])) {

if(regis($_POST) > 0) {
    echo "<script>
            alert('User baru berhasil ditambahkan!')
            document.location='login.php';
            </script>";
} else {
    echo mysqli_error($db);
}
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
            <form method="POST" action="">
            <div class="email center">
                <i class='bx bx-rename'></i>
                <input name="nama" type="text" class="" placeholder="Enter Your Email">
            </div>
            <div class="email center">
                <i class='bx bx-envelope' ></i>
                <input name="email" type="email" class="" placeholder="Enter Your Email">
            </div>
            <div class="password center">
                <i class='bx bxs-key' ></i>
                <input name="password" type="password" class="" placeholder="Enter Your Password">
            </div>
            <div class="password center">
                <i class='bx bx-key' ></i>
                <input name="password2" type="password" class="" placeholder="Enter Your Password">
            </div>
            <button name="daftar" class="log">Daftar</button>
</form>
        </div>
    </div>
</body>
</html>