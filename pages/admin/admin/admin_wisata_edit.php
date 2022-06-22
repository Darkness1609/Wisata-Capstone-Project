<?php
    $halaman = "Wisata";
    include 'header.php';

    $idWisata = $_GET['idWisata'];
    $sql = "SELECT * FROM tb_wisata WHERE idWisata = '$idWisata'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($query);
?>

<!--main-container-part-->
<div id="content">

<!--breadcrumbs-->
<div id="content-header">
	<div id="breadcrumb">
		<a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
		<a class="current"><i class="icon-group"></i><?= $halaman ?></a>
	</div> 
    <h1>Edit <?= $halaman ?></h1>
</div>

<div class="container-fluid">
<div class="widget-box">
    
</div>
<hr>
<div class="widget-box">
    <div class="widget-content">
        <form action="process/process_wisata.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="idWisata" value="<?= $data['idWisata']; ?>">

            <div class="control-group">
                <label for="">Nama Wisata:</label>
                <input type="text" placeholder="Nama Wisata" name="namaWisata" class="form-control" value="<?= $data['namaWisata']; ?>">
            </div>

            <div class="control-group">
                <label for="">Deskripsi:</label>
                <textarea name="deskripsi" id="editor"><?= $data['deskripsi']; ?></textarea>
            </div>

            <div class="control-group">
                <label for="">Gambar:</label>
                <img src="../../../assets/uploads/wisata/<?= $data['gambar']; ?>" class="img-form-view" alt="">
                <div class="controls">
                    <input type="file" name="gambar">
                </div>
            </div>

            <div class="control-group">
                <input type="submit" class="btn btn-primary" name="ubah" value="Simpan">
            </div>
        </form>
    </div>
</div>

<style>
    .form-control {
        box-sizing: border-box;
        width: 100%;
        padding-top: 15px !important;
        padding-bottom: 15px !important;
    }
    .img-form-view {
        width: 400px;
    }
</style>

<?php include 'footer.php'; ?>