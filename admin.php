<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login/login.php");
    exit;
}
include("produk/koneksi.php");

$halaman = 5;
$result=mysqli_query($db,"SELECT * FROM produk_tabel");
$jumlahinfo=mysqli_num_rows($result);
$jumlahhal=ceil($jumlahinfo/$halaman);
$aktif=(isset($_GET["hal"])) ? $_GET["hal"] :1 ;
$awal=($halaman * $aktif) - $halaman;

$sql = "SELECT * FROM produk_tabel LIMIT $awal, $halaman";
$query = mysqli_query($db, $sql);

if(isset($_GET["search"])){
    $keyword=$_GET['search'];
    $sql= "SELECT * FROM produk_tabel WHERE nama LIKE '%$keyword%'
    LIMIT $awal, $halaman";
    $query= mysqli_query($db, $sql);
}          
else{
    $sql= "SELECT * FROM produk_tabel LIMIT $awal, $halaman";
    $query= mysqli_query($db, $sql);
}  // car
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="admin2.css">
    <title>Admin</title>
</head>
<body>
    <div class="sidebar">
        <div class="box-logo-admin">
            <div class="logo-admin">
                RESIC.ID
            </div>
            <p>Welcome Admin</p>
        </div>
        <ul class="nav_list">
            <li>
                <a href="">
                    <i class='bx bx-grid-alt'></i>
                    <span class="bar-name">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="active" href="">
                    <i class='bx bxs-shopping-bag' ></i>
                    <span class="bar-name">Data Produk</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class='bx bx-user' ></i>
                    <span class="bar-name">Data Admin</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class='bx bxs-info-circle' ></i>
                    <span class="bar-name">About</span>
                </a>
            </li>
            <li>
                <a href="login/logout.php">
                    <i class='bx bxs-log-in-circle' ></i>
                    <span class="bar-name">Logout</span>
                </a>
            </li>
        </ul>
        <div class="profile-box">
            <div class="profile-content">
                <div class="profile">
                    <img src="img/3.jpg" alt="">
                    <div class="box-name">
                <div class="name">Muhammad Althaf</div>
                <div class="jabatan">Admin</div>
            </div>
            </div>
            </div>
        </div>
    </div>
    
    <div class="container-content">
        <div class="content">
             <a href="produk/form-produk.php">
                [ + ] Tambah Produk Baru</a>
        </div>
        <form>
            <input  type="text" name="search" placeholder="Search..">
        </form> 
        <?php 
       
         $no=1;
        ?>
        <div class="content-2">
                <table>
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Gambar</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>aksi</th>
                    </thead>
                    </tr>
                    <?php
                     while($member= mysqli_fetch_array($query)){
                         echo'
                         <tbody>
                         <td>'.$no++.'</td>
                         <td>'.$member['nama'].'</td>
                         <td><a href="produk/detail.php?nama='.str_replace(" ", "-", $member['nama']).'"><img src="produk/uploads/'.$member['tipe_gambar'].'" alt=""></a></td>
                         <td>'.$member['harga'].'</td>
                         <td>'.$member['kategori'].'</td>
                         <td><a href="produk/hapus.php?id='.$member['id'].'" onclick="return confirm(\'yakin ingin menghapus?\')".>Hapus</a>
                         <a href="produk/form-edit-produk.php?id='.$member['id'].'">Edit</a>
                         </td>
                     </tbody>
                         
                         ';
                     }
                   
                    ?>
                </table>
                
                <br><br>
                <div class="pagination">
                    <a href="?hal=<?= $aktif - 1; ?>">&laquo;</a>
                    <a href="?hal=1">1</a>
                    <a href="?hal=2">2</a>
                    <a href="?hal=3">3</a>
                    <a href="?hal=4">4</a>
                    <a href="?hal=5">5</a>
                    <a href="?hal=6">6</a>
                    <a href="?hal=<?= $aktif + 1; ?>">&raquo;</a>
                </div>
        </div>
    </div>
    
</body>
</html>