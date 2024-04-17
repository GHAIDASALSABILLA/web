<?php
require 'koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['namamahasiswa'];
$prodi = $_POST['namaprodi'];
$nomorhp = $_POST['nomorhp'];
$alamat = $_POST['alamat'];
$namaFile = $_FILES['photo']['name'];
$tmpName = $_FILES['photo']['tmp_name'];
move_uploaded_file($tmpName, "C:/xampp/htdocs/web/dist/img/" . $namaFile);


$query = 'INSERT INTO mahasiswa (NIM, Nama, No_Hp, Alamat, Password, id_Prodi, Foto)
             VALUES ("' . $nim . '", "' . $nama . '", "' . $nomorhp . '", "' . $alamat . '", "NULL", "' . $prodi . '", "' .$namaFile. '")';

mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "
            <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href='mahasiswa.php';
            </script>
    ";
} else {
    echo "
    <script>
    alert ('Data gagal ditambahkan');
    </script>
";
    echo mysqli_error($conn);
}
;