<?php
    $halaman = "Cafe";
    include 'header.php';

    $idCafe = $_GET['idCafe'];
    $sql = "SELECT * FROM tb_cafe WHERE idCafe = '$idCafe'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($query);
?>

<!--main-container-part-->
<div id="content">

<!--breadcrumbs-->
<div id="content-header">
	<div id="breadcrumb">
		<a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
		<a class="current"><i class="icon-group"></i>Kuliner</a>
	</div> 
    <h1>Edit Kuliner</h1>
</div>

<div class="container-fluid">
<div class="widget-box">
    
</div>
<hr>
<div class="widget-box">
    <div class="widget-content">
        <form action="process/process_cafe.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="idCafe" value="<?= $data['idCafe']; ?>">

            <div class="control-group">
                <label for="">Nama Kuliner:</label>
                <input type="text" placeholder="Nama Kuliner" name="namaCafe" class="form-control" value="<?= $data['namaCafe']; ?>">
            </div>

            <div class="control-group">
                <label for="">Deskripsi:</label>
                <textarea name="deskripsi" id="editor"><?= $data['deskripsi']; ?></textarea>
            </div>

            <div class="control-group">
                <label for="">Gambar:</label>
                <img src="../../../assets/uploads/cafe/<?= $data['gambar']; ?>" class="img-form-view" alt="">
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