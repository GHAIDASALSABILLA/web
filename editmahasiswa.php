<?php
session_start();
require 'koneksi.php';
ceklogin();
include 'template/header.php';
include 'template/sidebar.php';

$query = "SELECT * FROM prodi";
$hasil = mysqli_query($conn, $query);

$dataprodi = [];
while ($baris = mysqli_fetch_assoc($hasil)) {
    $dataprodi[] = $baris;
}

$nim = $_GET['nim']; 


$query = "SELECT * FROM mahasiswa WHERE nim = ?";
$stmt = mysqli_prepare($conn, $query);


mysqli_stmt_bind_param($stmt, "s", $nim);

mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);
$datamahasiswa = mysqli_fetch_assoc($result);

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Mahasiswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Mahasiswa</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Mahasiswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="editaksimahasiswa.php" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nim">nim</label>
                                    <input type="text" name="nim" class="form-control" id="nim" value="<?= $datamahasiswa['nim']?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $datamahasiswa['nama']?>">
                                </div>
                                <div class="form-group">
                                    <label for="prodi">Program Studi</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="prodi" name="prodi">
                                        <option value="">Pilih Prodi</option>
                                        <?php foreach ($dataprodi as $d) :?>
                                        <option value="<?= $d['ID_Prodi']; ?>" <?= ($d['ID_Prodi'] == $datamahasiswa['ID_Prodi']) ? "SELECTED" : "" ?>><?= $d['nama_prodi'];?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nohp">Nomor HP</label>
                                    <input type="text" name="nohp" class="form-control" id="nohp" value="<?= $datamahasiswa['no_hp']?>">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $datamahasiswa['alamat']?>">
                                </div>
                                <div class="form-group">
                                    <label for="foto">foto</label>
                                    <input type="hidden" name="fotolama" value="<?= $datamahasiswa['foto']?>">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <label for="foto"></label>
                                            <input type="file" id="foto" name="foto">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include 'template/footer.php';
?>