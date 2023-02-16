<?php
$database = new Database;
$db = $database->getConnection();

$select_distro = "SELECT * FROM distributor WHERE status_keaktifan = 'AKTIF' ORDER BY nama ASC";
$stmt_distro = $db->prepare($select_distro);
// $stmt_distro->execute();

$select_armada = "SELECT * FROM armada WHERE status_keaktifan = 'AKTIF' ORDER BY plat ASC";
$stmt_armada = $db->prepare($select_armada);
// $stmt_armada->execute();

$select_karyawan = "SELECT * FROM karyawan WHERE status_keaktifan = 'AKTIF' AND (jabatan = 'HELPER' OR jabatan = 'DRIVER') ORDER BY nama ASC";
$stmt_karyawan = $db->prepare($select_karyawan);
// $stmt_karyawan->execute();

?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Distribusi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
          <li class="breadcrumb-item"><a href="?page=distribusiread">Distribusi</a></li>
          <li class="breadcrumb-item active">Tambah Distribusi</li>
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
      <h3 class="card-title">Data Tambah Distribusi</h3>
      <a href="?page=distribusiread" class="btn btn-danger btn-sm float-right">
        <i class="fa fa-arrow-left"></i> Kembali
      </a>
    </div>
    <div class="card-body">
      <form action="" method="post">
        <div class="form-group">
          <label for="id_plat">Armada</label>
          <select name="id_plat" class="form-control" required>
            <option value="">--Pilih Armada--</option>
            <?php
            $stmt_armada->execute();
            while ($row_armada = $stmt_armada->fetch(PDO::FETCH_ASSOC)) {

              echo "<option value=\"" . $row_armada['id'] . "\">" . $row_armada['plat'], " - ", $row_armada['jenis_mobil'] . "</option>";
            }
            ?>
          </select>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Tim Pengirim</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="driver">Supir</label>
                  <select name="driver" class="form-control" required>
                    <option value="">--Pilih Nama Supir--</option>
                    <?php
                    $stmt_karyawan->execute();
                    while ($row_karyawan = $stmt_karyawan->fetch(PDO::FETCH_ASSOC)) {

                      echo "<option value=\"" . $row_karyawan['id'] . "\">" . $row_karyawan['nama'], " - ", $row_karyawan['sim'] . "</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="helper_1">Helper 1</label>
                  <select name="helper_1" class="form-control">
                    <option value="">--Pilih Nama Helper 1--</option>
                    <?php
                    $stmt_karyawan->execute();
                    while ($row_karyawan = $stmt_karyawan->fetch(PDO::FETCH_ASSOC)) {

                      echo "<option value=\"" . $row_karyawan['id'] . "\">" . $row_karyawan['nama'], " - ", $row_karyawan['sim'] . "</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="helper_2">Helper 2</label>
                  <select name="helper_2" class="form-control">
                    <option value="">--Pilih Nama Helper 2--</option>
                    <?php
                    $stmt_karyawan->execute();
                    while ($row_karyawan = $stmt_karyawan->fetch(PDO::FETCH_ASSOC)) {

                      echo "<option value=\"" . $row_karyawan['id'] . "\">" . $row_karyawan['nama'], " - ", $row_karyawan['sim'] . "</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Tujuan 1</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_pel_1">Distributor</label>
                  <select name="nama_pel_1" class="form-control" required>
                    <option value="">--Pilih Nama Distributor--</option>
                    <?php
                    $stmt_distro->execute();
                    while ($row_distro = $stmt_distro->fetch(PDO::FETCH_ASSOC)) {

                      echo "<option value=\"" . $row_distro['id'] . "\">" . $row_distro['nama'], " - ", $row_distro['id_da'], " (", $row_distro['jarak'], " km)" . "</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="pesanan">Pesanan</label>
                  <select id="listorder" name="pesanan" class="form-control" required>
                    <option value="">--Pilih Order--</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="cup1">Muatan Cup</label>
                  <input type="number" name="cup1" class="form-control">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="a3301">Muatan A330</label>
                  <input type="number" name="a3301" class="form-control">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="a5001">Muatan A500</label>
                  <input type="number" name="a5001" class="form-control">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="a6001">Muatan A600</label>
                  <input type="number" name="a6001" class="form-control">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="refill1">Muatan Refill</label>
                  <input type="number" name="refill1" class="form-control">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="jam_berangkat">Jam Keberangkatan</label>
          <div class="row">
            <div class="col-md-4">
              <input id='datetimepicker1' type='text' class='form-control' data-td-target='#datetimepicker1' placeholder="dd/mm/yyyy hh:mm" name="jam_berangkat" required>
            </div>
          </div>
        </div>
        <a href="?page=distribusiread" class="btn btn-danger btn-sm float-right">
          <i class="fa fa-times"></i> Batal
        </a>
        <button type="submit" name="button_create" class="btn btn-success btn-sm float-right mr-1">
          <i class="fa fa-save"></i> Simpan
        </button>
      </form>
    </div>
  </div>
</div>

<?php
include_once "../partials/scriptdatatables.php";
?>

<script>
  $("#datetimepicker1").keydown(function(event) {
    return false;
  });

  $('select[name="nama_pel_1"]').on('change', function(e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    var addition = document.getElementById('listorder');
    $('#listorder').find('option').remove().end()
    $.ajax({
      url: "./pages/distribusi/dataorder.php?id=" + valueSelected,
      method: "GET",
      dataType: 'json',
      success: function(data) {
        console.log(data);
        console.log(data[0][1]);
        console.log(data[1][1]);
        console.log(data[2][1]);
        if (data[0].length == 0) {
          var option = document.createElement("option");
          option.value = ``;
          option.text = `Order tidak ditemukan`;
          addition.add(option);
        } else {
          for (let i = 0; i < data.length; i++) {
            var option = document.createElement("option");
            option.value = `${data[i][0]}`;
            option.text = `${data[i][1]}`;
            addition.add(option);
          }
        }
      }
    });
  });
</script>
<!-- /.content -->