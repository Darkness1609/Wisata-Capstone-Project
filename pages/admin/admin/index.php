<?php 
  $halaman = "index";
  include 'header.php';

  $sql = "SELECT (SELECT COUNT(idCafe) FROM tb_cafe) AS cafeTotal, (SELECT COUNT(idEvent) FROM tb_event) AS eventTotal, (SELECT COUNT(idGaleri) FROM tb_galeri) AS galeriTotal, (SELECT COUNT(idHotel) FROM tb_hotel) AS hotelTotal, (SELECT COUNT(idWisata) FROM tb_wisata) AS wisataTotal";
  $query = mysqli_query($con, $sql);
  $data = mysqli_fetch_array($query);
?>

<!--main-container-part-->
<div id="content">

<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
<div class="container-fluid">
  <!--BARIS 1-->
  <div class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="btn-primary span5"> <a href="index.php"> <i class="icon-dashboard"></i>My Dashboard </a> </li>
      <li class="bg_lg span4"> <a href="admin_event.php"> <i class="icon-dashboard"></i><?= $data['eventTotal'] ?> Data Event (Berita & Acara)</a></li>
      <li class="bg_lo span3"> <a href="admin_cafe.php"> <i class="icon-sitemap"></i><?= $data['cafeTotal'] ?> Data Kuliner</a> </li>
      <li class="btn-warning span5"> <a href="admin_galeri.php"> <i class="icon-plane"></i> <?= $data['galeriTotal'] ?> Data Galeri</a></li>
      <li class="btn-warning span4"> <a href="admin_hotel.php"> <i class="icon-plane"></i> <?= $data['hotelTotal'] ?> Data Hotel</a> </li>
      <li class="btn-warning span3"> <a href="admin_wisata.php"> <i class="icon-plane"></i> <?= $data['wisataTotal'] ?> Data Wisata</a> </li>
      <li class="bg_lb span5"> <a href="logout.php"> <i class="icon-globe"></i>Logout</a> </li>
    </ul>
  </div>
</div>
</div>
<!--end-main-container-part-->

<?php include 'footer.php'; ?>