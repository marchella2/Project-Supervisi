<?php
session_start();
include 'assets/config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "select * from tb_user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
    $data = mysqli_fetch_assoc($login);

    if($data['level']=="guru"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "guru";
        header("location:guru.php");
    }else if($data['level']=="kurikulum"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "kurikulum";
        header("location:kurikulum.php");
    }else if($data['level']=="kepala sekolah"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "kepala sekolah";
        header("location:kepsek.php");
    }else if($data['level']=="supervisor"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "supervisor";
        header("location:supervisor.php");
    }else if($data['level']=="admin"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        header("location:admin.php");
    } else {
        echo "<script>alert('Username atau password anda salah');document.location.href='index.php'</script>";
    }
}else{
    echo "<script>alert('Username atau password anda salah');document.location.href='index.php'</script>";
}
?>  