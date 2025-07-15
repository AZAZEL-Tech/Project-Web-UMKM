<?php 
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$q = mysqli_query($conn,"select * from pelanggan where username = '".$username."' and password = '".($password)."'");
$r = mysqli_fetch_array ($q);
$q2 = mysqli_query($conn,"select * from petugas where username='".$username."' and password='".($password)."'");
$row = mysqli_fetch_array ($q2);
if (mysqli_num_rows($q) > 0) {
    $_SESSION['username'] = $r['username'];
    $_SESSION['password'] = $r['password'];
    $_SESSION['status_login']=true;
    header('location:.prokjek_umkm/index.php');
}
elseif (mysqli_num_rows($q2) > 0) {
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['status_login']=true;
    header('location:.projek_umkm/index.php');
}else {
    echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
}
?>

