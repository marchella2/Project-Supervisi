<?php 
error_reporting(0);
include "assets/config/koneksi.php";

if(isset($_POST['simpan'])){
    $sql = "INSERT INTO tb_user VALUES ('$_POST[id_user]', '$_POST[nama]', '$_POST[username]', '$_POST[password]', '$_POST[level]');";
    $eksekusi = mysqli_query($koneksi, $sql);
    echo "<script>alert('Berhasil tersimpan');document.location.href='?menu=input-user'</script>";
}

if(isset($_GET['edit'])){
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user='$_GET[id]'");
    $isi = mysqli_fetch_array($sql);
}

if(isset($_GET['hapus'])){
    $sql = mysqli_query($koneksi, "DELETE FROM tb_user WHERE id_user='$_GET[id]'");
}

if(isset($_POST['update'])){
    $sql = mysqli_query($koneksi, "UPDATE tb_user SET nama = '$_POST[nama]', username = '$_POST[username]', password = '$_POST[password]', level = '$_POST[level]' WHERE id_user = '$_GET[id]'");
    if($sql){
        echo "<script>alert('Data berhasil diubah');document.location.href='?menu=input-user';</script>";
    }else{
        echo "<script>alert('Data gagal diubah');document.location.href='?menu=input-user';</script>";
    }
}
?>
<html>
    <head>
        <title>Input Data User</title>
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
                <a class="nav-link" href="admin.php">Dashboard<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="input-guru.php">Input Data Guru</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="input-kurikulum.php">Input Data Kurikulum</a>
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
              <h6 class="m-0 font-weight-bold text-primary"><center>Input Data User</center></h6>
            </div>
            <div class="card-body">
            <form method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <input type="text" name="nama" class="form-control" value="<?php echo $isi['nama'] ?>" placeholder="Nama User">
                    </div>
                    <div class="col">
                        <input type="text" name="username" class="form-control" value="<?php echo $isi['username'] ?>" placeholder="Username">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="password" name="password" class="form-control" value="<?php echo $isi['password'] ?>" placeholder="Password">
                    </div>
                    <div class="col">
                        <input type="text" name="level" class="form-control" value="<?php echo $isi['level'] ?>" placeholder="Level">
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
                      <th>ID User</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Level</th>
                      <th colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $sql = mysqli_query($koneksi, "SELECT * FROM tb_user");
                        while($r=mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                            <td><?php echo $r['id_user'] ?></td>
                            <td><?php echo $r['nama'] ?></td>
                            <td><?php echo $r['username'] ?></td>
                            <td><?php echo $r['password'] ?></td>
                            <td><?php echo $r['level'] ?></td>
                            <td><a class="btn btn-primary" href="?menu=input-user&edit&id=<?php echo $r['id_user'] ?>">Edit</a></td>
                            <td><a class="btn btn-danger" href="?menu=input-user&hapus&id=<?php echo $r['id_user'] ?>" onClick="return confirm('Anda Yakin?')">Hapus</a></td>
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