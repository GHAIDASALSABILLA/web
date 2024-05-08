<?php
session_start();
require "koneksi.php";

$user = $_POST['User'];
$password = $_POST['Password'];

//query ke db
$result = mysqli_query($conn, "SELECT * FROM admin WHERE User='$user'");

$row = mysqli_fetch_assoc($result);

if (password_verify($password, $row['Password'])) {
    $_SESSION['login'] = true;
    $_SESSION['user'] = $row['user'];
    $_SESSION['foto'] = 'admin.jpg';
    $_SESSION['hakakses'] = 'admin';
    header("Location: index.php");
} else {
    echo "
    <script>
    alert('Username atau Password salah');
    document.location.href='loginadmin.php';
    </script>
    ";
}

//var_dump($row);