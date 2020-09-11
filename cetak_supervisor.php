<?php
include 'assets/config/koneksi.php';
?>

<html>
    <head>
        <title>Cetak Supervisor</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <center>
            <h3>Data Supervisor</h3>
        </center>
        <br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Supervisor</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat Rumah</th>
                      <th>Nomor HP</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $sql = mysqli_query($koneksi, "SELECT * FROM tb_supervisor");
                        while($r=mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                            <td><?php echo $r['kd_supervisor'] ?></td>
                            <td><?php echo $r['nama_supervisor'] ?></td>
                            <td><?php echo $r['jk'] ?></td>
                            <td><?php echo $r['alamat'] ?></td>
                            <td><?php echo $r['no_hp'] ?></td>
                        </tr>
                        <?php } ?>
                  </tbody>
        </table>
        <script>
            window.print();
        </script>
    </body>
</html>