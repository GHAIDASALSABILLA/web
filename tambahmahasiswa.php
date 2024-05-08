<?php
session_start();
require 'koneksi.php';
ceklogin();
cekadmin();
include 'template/header.php';
include 'template/sidebar.php';


$query = "SELECT * FROM prodi";
$hasil = mysqli_query($conn, $query);

$data = [];
while ($baris = mysqli_fetch_assoc($hasil)) {
    $data[] = $baris;
}

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
                            <h3 class="card-title">Tambah Mahasiswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="tambahaksimahasiswa.php" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nim">nim</label>
                                    <input type="text" name="nim" class="form-control" id="nim" placeholder="Masukkan nim">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama">
                                </div>
                                <div class="form-group">
                                    <label for="prodi">Program Studi</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="prodi" name="prodi">
                                        <option value="">Pilih Prodi</option>
                                        <?php foreach ($data as $d) :?>
                                        <option value="<?= $d['id_prodi']; ?>"><?= $d['nama_prodi'];?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nohp">Nomor HP</label>
                                    <input type="text" name="nohp" class="form-control" id="nohp" placeholder="Masukkan Nomor HP">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat">
                                </div>
                                <div class="form-group">
                                    <label for="foto">foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="foto" id="foto">
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