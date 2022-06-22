<?php
    include 'koneksi.php';

    // Generate random string untuk mencegah duplikat nama file gambar
    $randString = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 10);

    function tambahCafe($con, $randString) {
        // Form submit dari halaman sebelumnya
        $namaCafe = $_POST['namaCafe'];
        $deskripsi = htmlspecialchars(addslashes($_POST['deskripsi']));
        $filename = $randString."_".$_FILES["gambar"]["name"];
        $tempname = $_FILES["gambar"]["tmp_name"];
        
        // Tempat direktori menyimpan file gambar
        $folder = "../../../../assets/uploads/cafe/".$filename;

        // Jika berhasil menyimpan gambar maka insert ke database jika tidak kirim pesan "Failed to submit data"
        if (move_uploaded_file($tempname, $folder))  {
            $sql = "INSERT INTO tb_cafe VALUES(NULL, '$namaCafe', '$deskripsi', '$filename')";
            $query = mysqli_query($con, $sql);
            header("Location: ../admin_cafe.php");
            die();
        } else {
            echo "Failed to submit data";
        }
    }

    function ubahCafe($con, $randString) {
        // Form submit dari halaman sebelumnya
        $idCafe = $_POST['idCafe'];
        $namaCafe = $_POST['namaCafe'];
        $deskripsi = htmlspecialchars(addslashes($_POST['deskripsi']));
        $filename = $randString."_".$_FILES["gambar"]["name"];
        $tempname = $_FILES["gambar"]["tmp_name"];

        // Tempat direktori menyimpan file gambar
        $folder = "../../../../assets/uploads/cafe/".$filename;
        
        // Jika gambar akan diubah maka update db beserta dengan kolom gambar
        if (!empty($tempname)) {
            if (move_uploaded_file($tempname, $folder))  {
                $sql = "UPDATE tb_cafe SET
                    namaCafe = '$namaCafe',
                    deskripsi = '$deskripsi',
                    gambar = '$filename' WHERE idCafe = $idCafe";
                $query = mysqli_query($con, $sql);
                header("Location: ../admin_cafe.php");
                die();
            } else {
                echo "failed to submit data";
            }
        // Jika gambar diubah maka update db hanya nama dan deskripsi saja
        } else {
            $sql = "UPDATE tb_cafe SET
                namaCafe = '$namaCafe',
                deskripsi = '$deskripsi' WHERE idCafe = $idCafe";
            
            $query = mysqli_query($con, $sql) or die(mysqli_error($con));
            header("Location: ../admin_cafe.php");
            die();
        }
    }

    function deleteCafe($con, $idCafe) {        
        $sql = "DELETE FROM tb_cafe WHERE idCafe = '$idCafe'";
        $query = mysqli_query($con, $sql);
        header("Location: ../admin_cafe.php");
    }

    // Kondisi jika nama button = simpan, ubah, atau parameter URL requestType = "Hapus" maka jalankan fungsi tambah, ubah, delete, dll. sesuai fungsi yang udah ditulis di atas

    if (isset($_POST['simpan'])) {
        tambahCafe($con, $randString);
    } else if (isset($_POST['ubah'])) {
        ubahCafe($con, $randString);
    } else if ($_GET['requestType'] == "hapus") {
        $idCafe = $_GET['idCafe'];
        deleteCafe($con, $idCafe);
    }

    // Note: Untuk process lainnya selebihnya kodingan sama. Hanya beda variabel, beda nama tabel & kolom, beda direktori
?>