<?php include_once "../partials/cssdatatables.php" ?>
<!-- Content Header (Page header) -->
<?php
if (isset($_SESSION['hasil'])) {
  if ($_SESSION['hasil']) {
?>
    <div class="alert alert-success alert-dismissable">
      <button class="close" type="button" data-dismiss="alert" aria-hidden="true">X</button>
      <h5><i class="icon fas fa-check"></i>Sukses</h5>
      <?= $_SESSION['pesan'] ?>
    </div>

  <?php
  } else {
  ?>
    <div class="alert alert-danger alert-dismissable">
      <button class="close" type="button" data-dismiss="alert" aria-hidden="true">X</button>
      <h5><i class="icon fas fa-times"></i>Terjadi Kesalahan</h5>
      <?= $_SESSION['pesan'] ?>
    </div>
<?php }
  unset($_SESSION['hasil']);
  unset($_SESSION['pesan']);
}

?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Distribusi</h1>

      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
          <li class="breadcrumb-item active">Distribusi</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Distribusi</h3>
      <a href="?page=distribusicreate" class="btn btn-success btn-sm float-right">
        <i class="fa fa-plus-circle"></i> Tambah Data
      </a>
    </div>
    <div class="card-body">
      <table id="mytable" class="table table-bordered table-hover" style="white-space: nowrap; background-color: white; table-layout: fixed;">
        <thead>
          <tr>
            <th>No.</th>
            <th>Tanggal Input</th>
            <th>No. Perjalanan</th>
            <th>Plat</th>
            <th>Nama Driver</th>
            <th>Nama Helper 1</th>
            <th>Nama Helper 2</th>
            <th>Tujuan</th>
            <th>Cup</th>
            <th>A330</th>
            <th>A500</th>
            <th>A600</th>
            <th>Refill</th>
            <th>Jam Berangkat</th>
            <th>Estimasi Jam Datang</th>
            <th>Estimasi Lama Perjalanan</th>
            <th>Jam Datang</th>
            <th>Status</th>
            <th style="display: flex;">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $database = new Database;
          $db = $database->getConnection();

          $selectsql = "SELECT *, k1.nama supir, k2.nama helper1, k3.nama helper2, da.id id_distribusi_anggota
          FROM distribusi_anggota da LEFT JOIN distribusi_barang db on da.id = db.id_distribusi_anggota
          INNER JOIN armada a ON a.id = da.id_plat
          LEFT JOIN karyawan k1 ON k1.id = da.driver
          LEFT JOIN karyawan k2 ON k2.id = da.helper_1
          LEFT JOIN karyawan k3 ON k3.id = da.helper_2
          INNER JOIN pemesanan p ON p.id = db.id_order
          INNER JOIN distributor d ON d.id = p.id_distro";
          $stmt = $db->prepare($selectsql);
          $stmt->execute();

          $no = 1;
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $supir = $row['supir'] == NULL ? '-' : $row['supir'];
            $helper1 = $row['helper1'] == NULL ? '-' : $row['helper1'];
            $helper2 = $row['helper2'] == NULL ? '-' : $row['helper2'];
            $distro = $row['nama'] == NULL ? '-' : $row['nama'];
            $jam_datang = $row['jam_datang'] == NULL ? '-' : tanggal_indo($row['jam_datang']);
            $estimasi_lama_perjalanan = date_diff(date_create($row['jam_berangkat']), date_create($row['estimasi_jam_datang']))->format('%d Hari %h Jam %i Menit %s Detik');
          ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= tanggal_indo($row['tanggal']) ?></td>
              <td><?= $row['no_perjalanan'] ?></td>
              <td><?= $row['plat'], ' - ', $row['jenis_mobil']; ?></td>
              <td><?= $supir ?></td>
              <td><?= $helper1 ?></td>
              <td><?= $helper2 ?></td>
              <td><?= $distro ?></td>
              <td><?= $row['cup'] ?></td>
              <td><?= $row['a330'] ?></td>
              <td><?= $row['a500'] ?></td>
              <td><?= $row['a600'] ?></td>
              <td><?= $row['refill'] ?></td>
              <td><?= tanggal_indo($row['jam_berangkat']) ?></td>
              <td><?= tanggal_indo($row['estimasi_jam_datang']) ?></td>
              <td><?= $estimasi_lama_perjalanan ?></td>
              <td><?= $jam_datang ?></td>
              <td><?= $row['status'] ?></td>
              <td>
                <a href="?page=detaildistribusi&id=<?= $row['id_distribusi_anggota']; ?>" class="btn btn-success btn-sm mr-1">
                  <i class="fa fa-eye"></i> Lihat
                </a>
                <a href="?page=updatedistribusi&id=<?= $row['id_distribusi_barang']; ?>" class="btn btn-primary btn-sm mr-1">
                  <i class="fa fa-edit"></i> Ubah
                </a>
                <a href="?page=deletedistribusi&id=<?= $row['id_distribusi_anggota']; ?>" class="btn btn-danger btn-sm mr-1">
                  <i class="fa fa-trash"></i> Hapus
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.content -->
<?php
include_once "../partials/scriptdatatables.php";
?>
<script>
  $(function() {
    $('#mytable').DataTable({
      pagingType: "full_numbers",
      stateSave: true,
      stateDuration: 60,
      scrollX: true,
      scrollCollapse: true,
      fixedColumns: {
        leftColumns: 2,
        rightColumns: 1
      },
    });
  });

  $('a#distribusibatalvalidasi').click(function(e) {
    e.preventDefault();
    var urlToRedirect = e.currentTarget.getAttribute('href');
    //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
    Swal.fire({
      title: 'Apakah anda yakin?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Keluar',
      confirmButtonText: 'Ya'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = urlToRedirect;
      }
    })
  });

  if ($('div#hasil_validasi').length) {
    Swal.fire({
      title: 'Sukses!',
      text: 'Data berhasil divalidasi',
      icon: 'success',
      confirmButtonText: 'OK'
    })
  } else if ($('div#hasil_batal').length) {
    Swal.fire({
      title: 'Sukses!',
      text: 'Validasi berhasil dibatalkan',
      icon: 'success',
      confirmButtonText: 'OK'
    })
  }
</script>