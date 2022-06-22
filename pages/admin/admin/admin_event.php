<?php
    $halaman = "Event (Acara & Berita)";
    include 'header.php';
?>

<!--main-container-part-->
<div id="content">

<!--breadcrumbs-->
<div id="content-header">
	<div id="breadcrumb">
		<a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
		<a class="current"><i class="icon-group"></i><?= $halaman ?></a>
	</div> 
    <h1>Data <?= $halaman ?></h1>
    <a style="margin-left:25px" data-toggle="modal" data-target="#myModal" class="btn btn-info"><i class="icon-plus"></i>&nbsp; Data Baru</a>

</div>

<div class="container-fluid">
<hr>
<div class="widget-box">
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table" width="100%">
            <thead>
            <tr>
                <th width="5%">No.</th>
                <th width="35%">Nama Event</th>
                <th width="11%">Opsi</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * FROM tb_event";
                $query = mysqli_query($con, $sql);
                $nomor = 0;
                while ($data=mysqli_fetch_array($query)) {
                    $nomor++;
                ?>
                <tr>
                    <td><?= $nomor; ?></td>
                    <td><?= $data['namaEvent']; ?></td>
                    <td>
                        <a href="admin_event_edit.php?idEvent=<?= $data['idEvent'] ?>"><button>Edit</button></a> 
                        <a href="process/process_event.php?requestType=hapus&idEvent=<?= $data['idEvent'] ?>"><button>Hapus</button></a>
                    </td>
                </tr>
                <?php
                }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- modal input -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Data <?= $halaman ?> Baru</h4>
            </div>
            <div class="modal-body">
                <form action="process/process_event.php" method="POST" enctype="multipart/form-data">
                <div class="control-group">
                    <label class="control-label">Nama Event:</label>
                    <div class="controls">
                    <input type="text" class="span5" name="namaEvent" placeholder="Event Baru" />
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Deskripsi Event:</label>
                    <div class="controls">
                    <textarea name="deskripsi" id="editor" placeholder="Deskripsi Event" rows="10" class="span5"></textarea>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Gambar:</label>
                    <div class="controls">
                    <input type="file" name="gambar">
                    </div>
                </div>

                <div class="control-group">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                </div>
			</div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>