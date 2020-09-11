<?php
error_reporting(0);
include 'assets/config/koneksi.php';
?>
<html>
    <head>
        <title>Lihat Data Guru</title>
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
                <a class="nav-link" href="kepsek.php">Dashboard<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="lihat-supervisor.php">Lihat Data Supervisor</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="lihat-dokumen.php">Lihat Dokumen Pembelajaran</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            </ul>
        </div>
        </nav>
        <!-- Akhir navbar -->
        <br>
        <!-- Table -->
        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode Guru</th>
                      <th>Nama Guru</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat Rumah</th>
                      <th>Nomor HP</th>
                      <th>Guru Mapel</th>   
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $sql = mysqli_query($koneksi, "SELECT * FROM tb_guru");
                        while($r=mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                            <td><?php echo $r['kd_guru'] ?></td>
                            <td><?php echo $r['nama_guru'] ?></td>
                            <td><?php echo $r['jk'] ?></td>
                            <td><?php echo $r['alamat'] ?></td>
                            <td><?php echo $r['no_hp'] ?></td>
                            <td><?php echo $r['guru_mapel'] ?></td>
                        </tr>
                        <?php } ?>
                  </tbody>
                </table>
                <br>
                <center><a class="btn btn-info" href="cetak_guru.php" target="_blank">Cetak</a></center>
              </div>
        <!-- Akhir table -->
    </body>
</html>