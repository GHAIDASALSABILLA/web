<?php
require 'koneksi.php';

$nim = $_GET['NIM'];
$query ="DELETE FROM mahasiswa WHERE nim='$nim'";


mysqli_query($conn, $query);

if(mysqli_affected_rows($conn) > 0 ) {
    echo "
            <script>
            alert('Data Berhasil Dihapus');
            document.location.href='mahasiswa.php';
            </script>  
            ";
} else {
    echo "
    <script>
    alert('Data Gagal dihapus');
    </script>  
    ";
echo mysqli_error($conn);
};