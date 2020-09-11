<?php
include 'assets/config/koneksi.php';
?>
<html>
    <head>
        <title>Cetak Dokumen</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <center>
            <h3>Dokumen Pembelajaran</h3>
        </center>
        <br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Upload</th>
                      <th>Nama Guru</th>
                      <th>Mata Pelajaran</th>
                      <th>Nama File</th>
                      <th>Tanggal Upload</th>
                      <th>Status</th>
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
                        </tr>
                        <?php } ?>
                  </tbody>
        </table>
            <script>
                window.print();
            </script>
    </body>
</html>