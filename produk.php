<?php 
include("produk/koneksi.php");
$halaman = 5;
$result=mysqli_query($db,"SELECT * FROM produk_tabel");
$jumlahinfo=mysqli_num_rows($result);
$jumlahhal=ceil($jumlahinfo/$halaman);
$aktif=(isset($_GET["hal"])) ? $_GET["hal"] :1 ;
$awal=($halaman * $aktif) - $halaman;

$sql = "SELECT * FROM produk_tabel LIMIT $awal, $halaman";
$query = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Grey+Qo&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Caveat&family=Permanent+Marker&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Web project</title>
</head>
<body>
    <nav>
        <div class="logo">
            <h4><a href="">RESIC.ID</a></h4>
        </div>
        <ul>
            <li><a href="tampilan.php">Home</a></li>
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
          <div class="menu-toggle">
              <input type="checkbox">
              <span></span>
              <span></span>
              <span></span>
          </div>
    </nav>
    
    <!-- Section Shop -->
    <br><br>
    <div class="title">
      <h2>Our <strong>Product</strong></h2>
    </div>
   
      <?php 
       echo '<div class="main2 center">';
      while($member= mysqli_fetch_array($query)){
         
        echo '
        <div class="card-shop">
          <div class="card-shop-img">
            <img src="produk/uploads/'.$member['tipe_gambar'].'" alt="">
          </div>
          <div class="desc-shop">
            <h2>'.$member['nama'].'</h2>
            <span>'.$member['harga'].'</span>
            <a class="buy" href="detail-produk.php?nama='.str_replace(" ", "-", $member['nama']).'">Detail</a>
          </div>
        </div>
        ';
      
      };
      echo'</div>';
      ?>
   
      <br><br>
      <center><div class="pagination">
                    <a href="?hal=<?= $aktif - 1; ?>">&laquo;</a>
                    <a href="?hal=1">1</a>
                    <a href="?hal=2">2</a>
                    <a href="?hal=3">3</a>
                    <a href="?hal=4">4</a>
                    <a href="?hal=5">5</a>
                    <a href="?hal=6">6</a>
                    <a href="?hal=<?= $aktif + 1; ?>">&raquo;</a>
                </div></center>
                <br><br>
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