<?php 
error_reporting(0);
include "assets/config/koneksi.php";

if(isset($_POST['simpan'])){
    $sql = "INSERT INTO tb_supervisor VALUES ('$_POST[kd_supervisor]', '$_POST[nama_supervisor]', '$_POST[jk]', '$_POST[alamat]', '$_POST[no_hp]');";
    $eksekusi = mysqli_query($koneksi, $sql);
    echo "<script>alert('Berhasil tersimpan');document.location.href='?menu=input-supervisor'</script>";
}

if(isset($_GET['edit'])){
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_supervisor WHERE kd_supervisor='$_GET[id]'");
    $isi = mysqli_fetch_array($sql);
}

if(isset($_GET['hapus'])){
    $sql = mysqli_query($koneksi, "DELETE FROM tb_supervisor WHERE kd_supervisor='$_GET[id]'");
}

if(isset($_POST['update'])){
    $sql = mysqli_query($koneksi, "UPDATE tb_supervisor SET nama_supervisor = '$_POST[nama_supervisor]', jk = '$_POST[jk]', alamat = '$_POST[alamat]', no_hp = '$_POST[no_hp]' WHERE kd_supervisor = '$_GET[id]'");
    if($sql){
        echo "<script>alert('Data berhasil diubah');document.location.href='?menu=input-supervisor';</script>";
    }else{
        echo "<script>alert('Data gagal diubah');document.location.href='?menu=input-supervisor';</script>";
    }
}
?>
<html>
    <head>
        <title>Input Data Supervisi</title>
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
                <a class="nav-link" href="kurikulum.php">Dashboard<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="input-jadwal.php">Input Jadwal Supervisi</a>
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
              <h6 class="m-0 font-weight-bold text-primary"><center>Input Data Supervisor</center></h6>
            </div>
            <div class="card-body">
            <form method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <input type="text" name="nama_supervisor" class="form-control" value="<?php echo $isi['nama_supervisor'] ?>" placeholder="Nama Supervisor">
                    </div>
                    <div class="col">
                        <input type="text" name="jk" class="form-control" value="<?php echo $isi['jk'] ?>" placeholder="Jenis Kelamin">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="text" name="alamat" class="form-control" value="<?php echo $isi['alamat'] ?>" placeholder="Alamat Rumah">
                    </div>
                    <div class="col">
                        <input type="number" name="no_hp" class="form-control" value="<?php echo $isi['no_hp'] ?>" placeholder="Nomor Handphone">
                    </div>
                </div>
            </div>
            <?php if(isset($_GET['edit'])){ ?>
                <td><input type="submit" class="btn btn-warning" name="update" value="Update"></td>
            <?php }else{ ?>
                <td><input type="submit" class="btn btn-primary" name="simpan" value="Simpan"></td>
            <?php } ?>
            </form>
            <br><br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Supervisor</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat Rumah</th>
                      <th>Nomor HP</th>
                      <th colspan="2">Aksi</th>
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
                            <td><a class="btn btn-primary" href="?menu=input-supervisor&edit&id=<?php echo $r['kd_supervisor'] ?>">Edit</a></td>
                            <td><a class="btn btn-danger" href="?menu=input-supervisor&hapus&id=<?php echo $r['kd_supervisor'] ?>" onClick="return confirm('Anda Yakin?')">Hapus</a></td>
                        </tr>
                        <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <!-- Akhir Table Input -->
    </body>
</html>