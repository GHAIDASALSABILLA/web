<?php
session_start();
require "koneksi.php";

$nim = $_POST['nim'];
$password = $_POST['password'];

//query ke db
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='$nim'");

$row = mysqli_fetch_assoc($result);

if (password_verify($password, $row['password'])) {
    $_SESSION['login'] = true;
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['foto'] = $row['foto'];
    $_SESSION['hakakses'] = 'mahasiswa';
    header("Location: index.php");
} else {
    echo "
    <script>
    alert('Username atau Password salah');
    document.location.href='login.php';
    </script>
    ";
}

//var_dump($row);