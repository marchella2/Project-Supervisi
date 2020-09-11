<?php
include 'assets/config/koneksi.php';

    // Lokasi file sementara dan nama file dari fupload
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $nama_file = $_FILES['fupload']['name'];

    // Folder untuk menyimpan file
    $folder = "assets/files/$nama_file";
    
    // Tanggal
    $tgl_upload = date("Ymd");

    // Untuk upload file
    if(move_uploaded_file($lokasi_file, "$folder")){
        echo "Nama File : <b>$nama_file</b> berhasil di upload";

        // Input informasi file ke database
        $query = "INSERT INTO tb_upload (nama_guru, mata_pelajaran, nama_file, tgl_upload, status) VALUES ('$_POST[nama_guru]', '$_POST[mata_pelajaran]', '$nama_file', '$tgl_upload', 'Belum Cek')";
        mysqli_query($koneksi, $query);
    } else {
        echo "File gagal di upload";
    }

?>
<html>
    <head>
        <title>Hasil Upload</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
    <br>    
        <a class="btn btn-primary" href="input-dokumen.php" role="button">Back</a>
    </body>
</html>