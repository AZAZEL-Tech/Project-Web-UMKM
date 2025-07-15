<?php
if ($_POST) {
    include "koneksi.php";

    // Ambil data dan amankan
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Cek input
    if (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='register.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong');location.href='register.php';</script>";
    } else {
        // Enkripsi password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert ke tabel pelanggan (pastikan kolom lain tidak wajib diisi atau punya default)
        $insert = mysqli_query($conn, "
            INSERT INTO pelanggan (username, password) 
            VALUES ('$username', '$hashed_password')
        ");

        if ($insert) {
            echo "<script>alert('Sukses menambahkan pelanggan');location.href='login.php';</script>";
        } else {
            $error = mysqli_error($conn); // tampilkan error asli
            echo "<script>alert('Gagal menambahkan pelanggan: $error');location.href='register.php';</script>";
        }
    }
}
?>
