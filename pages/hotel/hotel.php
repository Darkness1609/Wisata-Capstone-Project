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
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="text-white lnr lnr-menu"></span>
					</button>

					<div class="collapse navbar-collapse justify-content-end align-items-center"
						id="navbarSupportedContent">
						<ul class="navbar-nav">
							<li><a href="../../index.php">Beranda</a></li>
							<li><a href="../wisata/wisata.php">Wisata</a></li>
							<li><a href="">Hotel</a></li>
							<li><a href="../kuliner/kuliner.php">Kuliner</a></li>
							<li><a href="../event/event.php">Berita</a></li>
							<li><a href="../galeri/galeri.php">Galeri</a></li>
							<li><a href="../tentang/tentang.php">Tentang</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<!-- End Header Area -->
	</section>

    <section class="default-banner active-blog-slider">
		<div class="item-slider relative" style="background: url('../../assets/images/hotel/banner1.jpg');background-size: cover;">
			<div class="overlay" style="background: rgba(0,0,0,.3)"></div>
			<div class="container">
				<div class="row fullscreen justify-content-center align-items-center">
					<div class="col-md-10 col-12">
						<div class="banner-content text-center">
							<h4 class="text-white mb-20 text-uppercase">Jelajahi Dunia Yang Penuh Warna Ini</h4>
							<h1 class="text-uppercase text-white">Temukan Tempat Peristirahatan Ternyaman</h1>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="item-slider relative" style="background: url('../../assets/images/hotel/banner2.jpg');background-size: cover;">
			<div class="overlay" style="background: rgba(0,0,0,.3)"></div>
			<div class="container">
				<div class="row fullscreen justify-content-center align-items-center">
					<div class="col-md-10 col-12">
						<div class="banner-content text-center">
							<h4 class="text-white mb-20 text-uppercase">Jelajahi Dunia Yang Penuh Warna Ini</h4>
							<h1 class="text-uppercase text-white">Temukan Tempat Peristirahatan Ternyaman</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="item-slider relative" style="background: url('../../assets/images/hotel/banner3.jpg');background-size: cover;">
			<div class="overlay" style="background: rgba(0,0,0,.3)"></div>
			<div class="container">
				<div class="row fullscreen justify-content-center align-items-center">
					<div class="col-md-10 col-12">
						<div class="banner-content text-center">
							<h4 class="text-white mb-20 text-uppercase">Jelajahi Dunia Yang Penuh Warna Ini</h4>
							<h1 class="text-uppercase text-white">Temukan Tempat Peristirahatan Ternyaman</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <div class="whole-wrap">
        <div class="container">
			<?php
				$sql = "SELECT * FROM tb_hotel ORDER BY idHotel DESC";
				$query = mysqli_query($con, $sql);
				$count = 0;
				while ($data = mysqli_fetch_array($query)) {
					$count = $count + 1;
					if ($count % 2 == 0) { ?>
						<div class="section-top-border text-right">
					<?php } else { ?>
						<div class="section-top-border">
					<?php } ?>
					<h3 class="mb-30"><?= $data['namaHotel']; ?></h3>
					<div class="row">
						<div class="col-md-3">
							<img src="../../assets/uploads/hotel/<?= $data['gambar']; ?>" alt="" class="img-fluid">
						</div>
						<div class="col-md-9 mt-sm-20">
							<?= htmlspecialchars_decode($data['deskripsi']); ?>
						</div>
					</div>
				</div>				
			<?php } ?>
        </div>
    </div>
	<?php include '../footer.php' ?>
</body>
</html>