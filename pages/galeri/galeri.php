<!DOCTYPE html>
<html lang="en" class="no-js">

<?php include '../header.php' ?>

<body>
	<!-- start banner Area -->
	<section class="banner-area" id="home">
		<!-- Start Header Area -->
		<header class="default-header">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<a class="navbar-brand" href="../../index.php">
						<img src="../../assets/images/spj4.PNG" width="150px" height="90px" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="text-white lnr lnr-menu"></span>
					</button>

					<div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
						<ul class="navbar-nav">
							<li><a href="../../index.php">Beranda</a></li>
							<li><a href="../wisata/wisata.php">Wisata</a></li>
							<li><a href="../hotel/hotel.php">Hotel</a></li>
							<li><a href="../kuliner/kuliner.php">Kuliner</a></li>
							<li><a href="../event/event.php">Berita</a></li>
							<li><a href="">Galeri</a></li>
							<li><a href="../tentang/tentang.php">Tentang</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<!-- End Header Area -->
	</section>

	<section class="default-banner active-blog-slider">
		<div class="item-slider relative" style="background: url(../../assets/img/slider1.jpg);background-size: cover;">
			<div class="overlay" style="background: rgba(0,0,0,.3)"></div>
			<div class="container">
				<div class="row fullscreen justify-content-center align-items-center">
					<div class="col-md-10 col-12">
						<div class="banner-content text-center">
							<h4 class="text-white mb-20 text-uppercase">Jelajahi Dunia Yang Penuh Warna Ini</h4>
							<h1 class="text-uppercase text-white">Kunjungi Galeri Kami</h1>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="item-slider relative" style="background: url(../../assets/img/slider2.jpg);background-size: cover;">
			<div class="overlay" style="background: rgba(0,0,0,.3)"></div>
			<div class="container">
				<div class="row fullscreen justify-content-center align-items-center">
					<div class="col-md-10 col-12">
						<div class="banner-content text-center">
							<h4 class="text-white mb-20 text-uppercase">Jelajahi Dunia Yang Penuh Warna Ini</h4>
							<h1 class="text-uppercase text-white">Kunjungi Galeri Kami</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="item-slider relative" style="background: url(../../assets/img/slider3.jpg);background-size: cover;">
			<div class="overlay" style="background: rgba(0,0,0,.3)"></div>
			<div class="container">
				<div class="row fullscreen justify-content-center align-items-center">
					<div class="col-md-10 col-12">
						<div class="banner-content text-center">
							<h4 class="text-white mb-20 text-uppercase">Jelajahi Dunia Yang Penuh Warna Ini</h4>
							<h1 class="text-uppercase text-white">Kunjungi Galeri Kami</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="container">
		<div class="section-top-border">
			<h3>Image Gallery</h3>
			<div class="row gallery-item">
				<?php 
					$sql = "SELECT * FROM tb_galeri";
					$query = mysqli_query($con, $sql);
					while ($data = mysqli_fetch_array($query)) {
					?>
						<div class="col-md-4">
							<a href="../../assets/uploads/galeri/<?= $data['gambar'] ?>" class="img-pop-up">
								<div class="single-gallery-image" style="background: url(../../assets/uploads/galeri/<?= $data['gambar'] ?>);"></div>
							</a>
						</div>
					<?php
					}
				?>
			</div>
		</div>
	</div>
	<?php include '../footer.php' ?>
</body>

</html>