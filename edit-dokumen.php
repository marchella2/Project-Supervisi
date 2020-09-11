<?php
    error_reporting(0);
    session_start();
    include 'assets/config/koneksi.php';

    if(isset($_GET['edit'])){
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_upload WHERE id_upload = '$_GET[id]'");
        $isi = mysqli_fetch_array($sql);
    }

    if(isset($_POST['update'])){
        
        $sql = mysqli_query($koneksi, "UPDATE tb_upload SET status = '$_POST[status]' where id_upload = $_POST[id_upload]");
        $isi = mysqli_fetch_array($sql);
        if($sql){
            echo "<script>alert('Data berhasil terupdate'); document.location.href='?menu=edit-dokumen';</script>";
        }else{
            echo "<script>alert('Data gagal terupdate'); document.location.href='?menu=edit-dokumen';</script>";
        }
    }
?>
<html>
    <head>
        <title>Edit Dokumen Pembelajaran</title>
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
                <a class="nav-link" href="supervisor.php">Dashboard<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            </ul>
        </div>
        </nav>
        <!-- Akhir navbar -->
        <br>
        <!-- Bagian Input / Edit-->
        <?php if(isset($_GET['id'])){ ?>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Dokumen</h6>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">             
                        <div class="row">
                            <div class="col">
                            <input type="text" name="nama_guru" class="form-control" placeholder="Nama Guru" value="<?php echo $isi['nama_guru'] ?>" disabled required>
                            <input type="hidden" name="id_upload" class="form-control" value="<?php echo $isi['id_upload'] ?>">
                            </div>
                            <div class="col">
                            <input type="text" name="mata_pelajaran" class="form-control" placeholder="Mata Pelajaran" value="<?php echo $isi['mata_pelajaran'] ?>" disabled required>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                            <input type="text" name="nama_file" class="form-control" value="<?php echo $isi['nama_file'] ?>"  placeholder="Nama File" disabled required>
                            </div>
                        </div>
                    <div class="col"></div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                            <select class="form-control" name="status" required>
                                <option>Belum Cek</option>
                                <option>Tolak</option>
                                <option>Terima</option>
                            </select>
                            </div class="col">    
                        </div>
                    <div class="col"></div>
                    </div>
                    <br>
                <td><input class="btn btn-primary" type="submit" name="update" value="UPDATE"></td>
                </form>
            </div>
            </div>
        <?php } ?>
        <!-- Akhir Input / Edit -->
        <br>
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
                      <th colspan="2">Aksi</th>
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
                            <td><a class="btn btn-primary" href="?menu=edit-dokumen&edit&id=<?php echo $r['id_upload'] ?>">Edit</a></td>
                            <td><a class="btn btn-success" href="simpan.php?id_upload=<?php echo $r['id_upload'] ?>" onClick="return ">Download</a></td>
                        </tr>
                        <?php } ?>
                  </tbody>
                </table>
              </div>
        <!-- Akhir table -->
    </body>
</html>