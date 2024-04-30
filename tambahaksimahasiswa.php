<?php 

require 'koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$prodi = $_POST['prodi'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];

$namafile = $_FILES['foto']['name'];
$tmpname = $_FILES['foto']['tmp_name'];

$ekstensifoto = explode('.', $namafile);
$ekstensifoto = strtolower(end($ekstensifoto));
$ekstensiTipe = ['jpg', 'png', 'jpeg'];

if (!in_array($ekstensifoto, $ekstensiTipe)) {
    echo "
    <script>
        alert('File yang anda upload bukan file gambar');
        document.location.href='tambahmahasiswa.php';
    </script>
    ";
}

$namaFileBaru = $nim;
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensifoto;

$password = password_hash($nim,PASSWORD_DEFAULT);

$query = "INSERT INTO mahasiswa (nim,nama,no_hp,alamat,id_prodi, foto, password) VALUES ('$nim', '$nama', '$nohp', '$alamat', '$prodi', '$namaFileBaru', '$password')";

move_uploaded_file($tmpname, "dist/img/" . $namaFileBaru);

mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href='mahasiswa.php';
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