<?php 
error_reporting(0);
include "assets/config/koneksi.php";

// Untuk delete
if(isset($_GET['hapus'])){
    $sql = mysqli_query($koneksi, "DELETE FROM tb_upload  WHERE id_upload = '$_GET[id]'");
    if ($sql) {
      echo "<script>alert('Document Berhasil Dihapus'); document.location.href='?menu=input-dokumen.php';</script>";
    } else {
      echo "<script>alert('Document Gagal Dihapus'); document.location.href='?menu=input-dokumen.php';</script>";

    }
  }
?>
<html>
    <head>
        <title>Input Dokumen</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <!-- Navbar --> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Supervisi Digital</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="guru.php">Dashboard<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            </ul>
        </div>
        </nav>
        <!-- Akhir navbar -->
        <br>
        <!-- Table Input -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><center>Input Dokumen Pembelajaran</center></h6>
              </div>
              <div class="card-body">
              <form enctype="multipart/form-data" method="POST" action="hasil_upload.php">
              <div class="form-group">
                  <div class="row">
                      <div class="col">
                      <input type="text" name="nama_guru" class="form-control" placeholder="Nama Guru">
                      </div>
                      <div class="col">
                      <input type="text" name="mata_pelajaran" class="form-control" placeholder="Mata Pelajaran">
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col">
                          <input type="file" class="form-control" name="fupload" placeholder="dokumen">
                      </div>
                  </div>
              </div>
              <button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
              </form>
          </div>
        <!-- Akhir Table Input -->
        <!-- Table -->
        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Upload</th>
                      <th>Nama Guru</th>
                      <th>Mata Pelajaran</th>
                      <th>Nama File</th>
                      <th>Tanggal Upload</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $sql = mysqli_query($koneksi, "SELECT * FROM tb_upload");
                        while($r=mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                            <td><?php echo $r['id_upload'] ?></td>
                            <td><?php echo $r['nama_guru'] ?></td>
                            <td><?php echo $r['mata_pelajaran'] ?></td>
                            <td><?php echo $r['nama_file'] ?></td>
                            <td><?php echo $r['tgl_upload'] ?></td>     
                            <td><?php echo $r['status'] ?></td> 
                            <td><a class="btn btn-danger" href="?menu=guru&hapus&id=<?php echo $r['id_upload'] ?>">Hapus</a></td>                  
                        </tr>
                        <?php } ?>
                  </tbody>
                </table>
              </div>
        <!-- Akhir table -->
    </body>
</html>