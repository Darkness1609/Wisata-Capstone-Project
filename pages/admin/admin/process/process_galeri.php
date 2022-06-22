<?php
    include 'koneksi.php';

    $randString = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 10);

    function tambahGaleri($con, $randString) {
        $namaGaleri = $_POST['namaGaleri'];
        $filename = $randString."_".$_FILES["gambar"]["name"];
        $tempname = $_FILES["gambar"]["tmp_name"];

        $folder = "../../../../assets/uploads/Galeri/".$filename;

        if (move_uploaded_file($tempname, $folder))  {
            $sql = "INSERT INTO tb_galeri VALUES(NULL, '$namaGaleri', '$filename')";
            $query = mysqli_query($con, $sql);
            header("Location: ../admin_galeri.php");
            die();
        } else {
            $msg = "Failed to submit data";
        }
    }

    function ubahGaleri($con, $randString) {
        $idGaleri = $_POST['idGaleri'];
        $namaGaleri = $_POST['namaGaleri'];
        $filename = $randString."_".$_FILES["gambar"]["name"];
        $tempname = $_FILES["gambar"]["tmp_name"];
        $folder = "../../../../assets/uploads/galeri/".$filename;
        
        if (!empty($tempname)) {
            if (move_uploaded_file($tempname, $folder))  {
                $sql = "UPDATE tb_galeri SET
                    namaGaleri = '$namaGaleri',
                    deskripsi = '$deskripsi',
                    gambar = '$filename' WHERE idGaleri = $idGaleri";
                $query = mysqli_query($con, $sql);
                header("Location: ../admin_galeri.php");
                die();
            } else {
                echo "failed to submit data";
            }
        } else {
            $sql = "UPDATE tb_galeri SET
                namaGaleri = '$namaGaleri' WHERE idGaleri = $idGaleri";
            
            $query = mysqli_query($con, $sql) or die(mysqli_error($con));
            header("Location: ../admin_galeri.php");
            die();
        }
    }

    function deleteGaleri($con, $idGaleri) {        
        $sql = "DELETE FROM tb_galeri WHERE idGaleri = '$idGaleri'";
        $query = mysqli_query($con, $sql);
        header("Location: ../admin_galeri.php");
    }

    // =============

    if (isset($_POST['simpan'])) {
        tambahGaleri($con, $randString);
    } else if (isset($_POST['ubah'])) {
        ubahGaleri($con, $randString);
    } else if ($_GET['requestType'] == "hapus") {
        $idGaleri = $_GET['idGaleri'];
        deleteGaleri($con, $idGaleri);
    }
?>