<?php
session_start();
require 'koneksi.php';
ceklogin();
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$prodi = $_POST['prodi'];
$no_hp = $_POST['nohp'];
$alamat = $_POST['alamat'];
$fotolama = $_POST['fotolama'];

// Corrected file upload logic
if ($_FILES['foto']['error'] == 0) {
    $namaFile = $_FILES['foto']['name'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // Extract file extension correctly
    $ekstensiFoto = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    $ekstensiTipe = ['jpg', 'png', 'jpeg'];

    if (!in_array($ekstensiFoto, $ekstensiTipe)) {
        echo "
        <script>
        alert('File yang anda upload bukan bertipe gambar');
        document.location.href='editmahasiswa.php';
        </script>
        ";
    } else {
        $namaFileBaru = $nim . '.' . $ekstensiFoto;
        move_uploaded_file($tmpName, "dist/img/" . $namaFileBaru);

        // Delete old file if it's different
        if ($fotolama !== $namaFileBaru && file_exists("dist/img/" . $fotolama)) {
            unlink("dist/img/" . $fotolama);
        }
        $namaFile = $namaFileBaru; // update with the new file name
    }
} else {
    $namaFile = $fotolama;
}

// Update query corrected with SQL injection prevention
$query = "UPDATE mahasiswa SET nama=?, no_hp=?, alamat=?, id_prodi=?, foto=? WHERE nim=?";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ssssss", $nama, $no_hp, $alamat, $prodi, $namaFile, $nim);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "
            <script>
            alert('Data Berhasil Diperbarui');
            document.location.href='mahasiswa.php';
            </script>
    ";
} else {
    echo "
    <script>
    alert ('Data berhasil diperbarui');
    document.location.href='mahasiswa.php';
    </script>
";
    echo mysqli_error($conn);
}
?>