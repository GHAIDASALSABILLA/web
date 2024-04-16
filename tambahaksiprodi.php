<?php
require 'koneksi.php';

$prodi = $_POST['namaprodi'];

echo 'nama prodinya adalah: ' . $prodi ;

$query = "INSERT INTO prodi(nama_prodi) VALUES ('$prodi')";

mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href='prodi.php';
            </script>
            
    ";
}else {
    echo "
        <script>
        alert ('Data gagal ditambahkan');
        </script>
    ";
    echo mysqli_error($conn);
    };

?>