<?php 
include 'assets/config/koneksi.php';
?>

<html>
    <head>
        <title>Cetak Data Guru</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <center>
            <h3>Data Guru</h3>
        </center>
        <br>
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
        <script>
                window.print();
            </script>
    </body>
</html>