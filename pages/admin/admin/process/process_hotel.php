<?php
    include 'koneksi.php';

    $randString = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 10);

    function tambahHotel($con, $randString) {
        $namaHotel = $_POST['namaHotel'];
        $deskripsi = htmlspecialchars(addslashes($_POST['deskripsi']));
        $filename = $randString."_".$_FILES["gambar"]["name"];
        $tempname = $_FILES["gambar"]["tmp_name"];

        $folder = "../../../../assets/uploads/hotel/".$filename;

        if (move_uploaded_file($tempname, $folder))  {
            $sql = "INSERT INTO tb_hotel VALUES(NULL, '$namaHotel', '$deskripsi', '$filename')";
            $query = mysqli_query($con, $sql);
            header("Location: ../admin_hotel.php");
            die();
        } else {
            $msg = "Failed to submit data";
        }
    }

    function ubahHotel($con, $randString) {
        $idHotel = $_POST['idHotel'];
        $namaHotel = $_POST['namaHotel'];
        $deskripsi = htmlspecialchars(addslashes($_POST['deskripsi']));
        $filename = $randString."_".$_FILES["gambar"]["name"];
        $tempname = $_FILES["gambar"]["tmp_name"];
        $folder = "../../../../assets/uploads/hotel/".$filename;
        
        if (!empty($tempname)) {
            if (move_uploaded_file($tempname, $folder))  {
                $sql = "UPDATE tb_hotel SET
                    namaHotel = '$namaHotel',
                    deskripsi = '$deskripsi',
                    gambar = '$filename' WHERE idHotel = $idHotel";
                $query = mysqli_query($con, $sql);
                header("Location: ../admin_hotel.php");
                die();
            } else {
                echo "failed to submit data";
            }
        } else {
            $sql = "UPDATE tb_hotel SET
                namaHotel = '$namaHotel',
                deskripsi = '$deskripsi' WHERE idHotel = $idHotel";
            
            $query = mysqli_query($con, $sql) or die(mysqli_error($con));
            header("Location: ../admin_hotel.php");
            die();
        }
    }

    function deleteHotel($con, $idHotel) {        
        $sql = "DELETE FROM tb_Hotel WHERE idHotel = '$idHotel'";
        $query = mysqli_query($con, $sql);
        header("Location: ../admin_hotel.php");
    }

    // =============

    if (isset($_POST['simpan'])) {
        tambahHotel($con, $randString);
    } else if (isset($_POST['ubah'])) {
        ubahHotel($con, $randString);
    } else if ($_GET['requestType'] == "hapus") {
        $idHotel = $_GET['idHotel'];
        deleteHotel($con, $idHotel);
    }
?>