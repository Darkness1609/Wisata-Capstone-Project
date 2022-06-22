<?php
    include 'koneksi.php';

    $randString = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 10);

    function tambahWisata($con, $randString) {
        $namaWisata = $_POST['namaWisata'];
        $deskripsi = htmlspecialchars(addslashes($_POST['deskripsi']));
        $filename = $randString."_".$_FILES["gambar"]["name"];
        $tempname = $_FILES["gambar"]["tmp_name"];

        $folder = "../../../../assets/uploads/wisata/".$filename;

        if (move_uploaded_file($tempname, $folder))  {
            $sql = "INSERT INTO tb_wisata VALUES(NULL, '$namaWisata', '$deskripsi', '$filename')";
            $query = mysqli_query($con, $sql);
            header("Location: ../admin_wisata.php");
            die();
        } else {
            $msg = "Failed to submit data";
        }
    }

    function ubahWisata($con, $randString) {
        $idWisata = $_POST['idWisata'];
        $namaWisata = $_POST['namaWisata'];
        $deskripsi = htmlspecialchars(addslashes($_POST['deskripsi']));
        $filename = $randString."_".$_FILES["gambar"]["name"];
        $tempname = $_FILES["gambar"]["tmp_name"];
        $folder = "../../../../assets/uploads/wisata/".$filename;
        
        if (!empty($tempname)) {
            if (move_uploaded_file($tempname, $folder))  {
                $sql = "UPDATE tb_wisata SET
                    namaWisata = '$namaWisata',
                    deskripsi = '$deskripsi',
                    gambar = '$filename' WHERE idWisata = $idWisata";
                $query = mysqli_query($con, $sql);
                header("Location: ../admin_wisata.php");
                die();
            } else {
                echo "failed to submit data";
            }
        } else {
            $sql = "UPDATE tb_wisata SET
                namaWisata = '$namaWisata',
                deskripsi = '$deskripsi' WHERE idWisata = $idWisata";
            
            $query = mysqli_query($con, $sql) or die(mysqli_error($con));
            header("Location: ../admin_wisata.php");
            die();
        }
    }

    function deleteWisata($con, $idWisata) {        
        $sql = "DELETE FROM tb_wisata WHERE idWisata = '$idWisata'";
        $query = mysqli_query($con, $sql);
        header("Location: ../admin_wisata.php");
    }

    // =============

    if (isset($_POST['simpan'])) {
        tambahWisata($con, $randString);
    } else if (isset($_POST['ubah'])) {
        ubahWisata($con, $randString);
    } else if ($_GET['requestType'] == "hapus") {
        $idWisata = $_GET['idWisata'];
        deleteWisata($con, $idWisata);
    }
?>