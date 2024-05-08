<?php
session_start();

require 'koneksi.php';
ceklogin();
cekadmin();

include 'template/header.php';
include 'template/sidebar.php';



$query = "SELECT * FROM mahasiswa JOIN prodi ON mahasiswa.id_prodi = prodi.id_prodi";
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
            <li class="breadcrumb-item active"></li>
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Mahasiswa</h3>

              <div class="card-tools">
              <div class="card-tools">
              <a href="tambahmahasiswa.php" class="btn btn-primary">Tambah</a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>nim</th>
                    <th>nama</th>
                    <th>prodi</th>
                    <th>no handphone</th>
                    <th>alamat</th>
                    <th>foto</th>
                    <th>aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($data as $d) {
                  ?>
                    <tr>
                      <td><?php echo $i++ ?></td>
                      <td><?php echo $d['nim'] ?></td>
                      <td><?php echo $d['nama'] ?>
                      <td><?php echo $d['nama_prodi'] ?>
                      <td><?php echo $d['no_hp'] ?>
                      <td><?php echo $d['alamat'] ?></td>
                      <td> <img src="dist/img/<?php echo $d['foto'] ?>" width="50px" height="50px" /> </td>
                      <td><a href="editmahasiswa.php?nim=<?= $d['nim'] ?>" class="btn btn-warning" >Edit</a>
                    <a href="hapusmahasiswa.php?nim=<?= $d['nim'] ?>" class="btn btn-danger" >Hapus</a>
                    </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>

</html>