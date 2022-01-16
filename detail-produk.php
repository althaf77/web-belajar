<?php
include("produk/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="detail.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Grey+Qo&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Caveat&family=Permanent+Marker&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<title>Produk | <?= $nama ?></title>
    <?php 
$url=$_GET['nama'];
$nama=str_replace("-"," ",$url);

?>
</head>
<body>
    <nav>
        <div class="logo">
            <h4><a href="">RESIC.ID</a></h4>
        </div>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#layanan">Layanan</a></li>
            <li><a href="#shop">Produk</a></li>
            <li><a href="#about">About</a></li>
            <li class="dropdown">
              <a class="dropbtn">Opsi</a>
              <div class="dropdown-content">
                <a href="#">Shop</a>
                <a href="#">Mitra</a>
                <a href="#">Masukan</a>
              </div>
            </li>
          </ul>

          <div class="login">
              <button class="tombol">Login</button>
          </div>
          <div class="menu-toggle">
              <input type="checkbox">
              <span></span>
              <span></span>
              <span></span>
          </div>
    </nav>
    <br> <br>
    
    <!-- Section Shop -->
    
    <?php
 
 $sql= "SELECT * FROM produk_tabel WHERE nama='$nama'";
 $query= mysqli_query($db, $sql);
 $member=mysqli_fetch_array($query);
 $no=1;
 ?>
    <div class="container">
        <div class="gambar-produk">
        <img src="produk/uploads/<?= $member['tipe_gambar']?>">
        </div>

        <div class="tabel-detail">
            <table>
               <tr>
                   <th>No</th>
                   <td><?= $no++?></td>
               </tr>
               <tr>
                   <th>Nama Produk</th>
                   <td><?= $member['nama'] ?></td>
               </tr>
               <tr>
                   <th>Kategori</th>
                   <td><?= $member['kategori'] ?></td>
               </tr>
               <tr>
                   <th>Nama Toko</th>
                   <td><?= $member['toko'] ?></td>
               </tr>
               <tr>
                   <th>Harga</th>
                   <td>Rp.<?= $member['harga'] ?></td>
               </tr>
               <tr>
                   <th>Deskripsi Produk</th>
                   <td><?= $member['deskripsi'] ?></td>
               </tr>
            </table>
        </div>
        <div class="buy">
            <a href="">Buy</a>
        </div>
    </div>
    <br> <br>
    <!-- Section Footer -->
    <section id="about">
        <footer>
            <div class="footer-1">
                <h3>RESIC.ID</h3>
                <p>RESIC.ID Adalah bisnis yang bergerak dibidang ramah lingkungan</p>
                <ul>
                    <li><a href=""></a><i class="fab fa-instagram"></i></li>
                    <li><a href=""></a><i class="fab fa-whatsapp"></i></li>
                    <li><a href=""></a><i class="fab fa-facebook"></i></li>
                    <li><a href=""></a><i class="fab fa-twitter"></i></li>
                  </ul>
            </div>
            <div class="footer-2">
              <h3>Company</h3>
              <ul>
                <li><a href="">About</a></li>
                <li><a href="">Details</a></li>
                <li><a href="">Terms of Service</a></li>
                <li><a href="">Privacy Policy</a></li>
              </ul>
            </div>
            <div class="footer-3">
                <h3>Alamat</h3>
                <p>Perumahan Oma Indah Menganti, D4-02 
                    Kec. Menganti, Kab. Gresik, Jawa Timur</p>
            </div>

            <div class="footer-4">
                <h3>Kritik dan Saran</h3>
                <form action="">
                    <label for="fname">Saran dan Kritik </label><br>
                  <textarea name="" id="" cols="30" rows="10">
                  </textarea>
                  <br><br>
                  <input type="submit" value="Submit">
                </form>

            </div>
            
        </footer>
        <div class="copyright">
          <p>&copy 2021 | by RESIC.ID</p>
        </div>
    </section>
    <script src="script.js"></script>
</body>
</html>