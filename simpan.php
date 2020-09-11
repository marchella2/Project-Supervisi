<?php
    include 'assets/config/koneksi.php';

    $id_upload = $_GET['id_upload'];
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_upload WHERE id_upload = '$id_upload'");
    $isi = mysqli_fetch_array($sql);
    $filename = $isi['nama_file'];

    $file = "assets/files/$filename";
    
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }

    header("Location: edit-dokumen.php");

?>