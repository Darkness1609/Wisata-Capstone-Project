<?php
    include 'koneksi.php';

    $randString = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 10);

    function tambahEvent($con, $randString) {
        $namaEvent = $_POST['namaEvent'];
        $deskripsi = htmlspecialchars(addslashes($_POST['deskripsi']));
        $filename = $randString."_".$_FILES["gambar"]["name"];
        $tempname = $_FILES["gambar"]["tmp_name"];

        $folder = "../../../../assets/uploads/events/".$filename;

        if (move_uploaded_file($tempname, $folder))  {
            $sql = "INSERT INTO tb_event VALUES(NULL, '$namaEvent', '$deskripsi', '$filename')";
            $query = mysqli_query($con, $sql);
            header("Location: ../admin_event.php");
            die();
        } else {
            $msg = "Failed to submit data";
        }
    }

    function ubahEvent($con, $randString) {
        $idEvent = $_POST['idEvent'];
        $namaEvent = $_POST['namaEvent'];
        $deskripsi = htmlspecialchars(addslashes($_POST['deskripsi']));
        $filename = $randString."_".$_FILES["gambar"]["name"];
        $tempname = $_FILES["gambar"]["tmp_name"];
        $folder = "../../../../assets/uploads/events/".$filename;
        
        if (!empty($tempname)) {
            if (move_uploaded_file($tempname, $folder))  {
                $sql = "UPDATE tb_event SET
                    namaEvent = '$namaEvent',
                    deskripsi = '$deskripsi',
                    gambar = '$filename' WHERE idEvent = $idEvent";
                $query = mysqli_query($con, $sql);
                header("Location: ../admin_event.php");
                die();
            } else {
                echo "failed to submit data";
            }
        } else {
            $sql = "UPDATE tb_event SET
                namaEvent = '$namaEvent',
                deskripsi = '$deskripsi' WHERE idEvent = $idEvent";
            
            $query = mysqli_query($con, $sql) or die(mysqli_error($con));
            header("Location: ../admin_event.php");
            die();
        }
    }

    function deleteEvent($con, $idEvent) {        
        $sql = "DELETE FROM tb_event WHERE idEvent = '$idEvent'";
        $query = mysqli_query($con, $sql);
        header("Location: ../admin_event.php");
    }

    // =============

    if (isset($_POST['simpan'])) {
        tambahEvent($con, $randString);
    } else if (isset($_POST['ubah'])) {
        ubahEvent($con, $randString);
    } else if ($_GET['requestType'] == "hapus") {
        $idEvent = $_GET['idEvent'];
        deleteEvent($con, $idEvent);
    }
?>