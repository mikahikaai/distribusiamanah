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
        <div id="rownum" class="card">
          <div class="card-header">
            <h4 id="new_tujuan" class="card-title">Tujuan 1</h4>
            <button type="button" name="tambah_tujuan" class="btn btn-success btn-sm float-right">
              <i class="fa fa-plus"></i>
            </button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
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
              <div class="col-md-4">
                <div class="form-group">
                  <label for="pesanan">Pesanan</label>
                  <select id="listorder" name="pesanan" class="form-control" required>
                    <option value="">--Pilih Order--</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="tgl_order">Tanggal Order</label>
                  <input type="text" class="form-control" name="tgl_order" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="cup1">Muatan Cup</label>
                  <input type="number" name="cup1" class="form-control" readonly>
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="a3301">Muatan A330</label>
                  <input type="number" name="a3301" class="form-control" readonly>
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="a5001">Muatan A500</label>
                  <input type="number" name="a5001" class="form-control" readonly>
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="a6001">Muatan A600</label>
                  <input type="number" name="a6001" class="form-control" readonly>
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="refill1">Muatan Refill</label>
                  <input type="number" name="refill1" class="form-control" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="new"></div>

        <div class="form-group mt-3">
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
        // console.log(data);
        if (data[0].length == 0) {
          var option = document.createElement("option");
          option.value = ``;
          option.text = `Order tidak ditemukan`;
          addition.add(option);
          $("input[name='tgl_order']").val('Order tidak ditemukan')
          $("input[name='cup1']").val(0)
          $("input[name='a3301']").val(0)
          $("input[name='a5001']").val(0)
          $("input[name='a6001']").val(0)
          $("input[name='refill1']").val(0)
        } else {
          for (let i = 0; i < data.length; i++) {
            var option = document.createElement("option");
            option.value = `${data[i][0]}`;
            option.text = `${data[i][1]}`;
            addition.add(option);
            $("input[name='tgl_order']").val(data[i][2]);
            $("input[name='cup1']").val(data[i][3]);
            $("input[name='a3301']").val(data[i][4]);
            $("input[name='a5001']").val(data[i][5]);
            $("input[name='a6001']").val(data[i][6]);
            $("input[name='refill1']").val(data[i][7]);
          }
        }
      }
    });
  });

  $('select[name="pesanan"]').on('change', function(e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    $.ajax({
      url: "./pages/distribusi/dataorderbyid.php?id=" + valueSelected,
      method: "GET",
      dataType: 'json',
      success: function(data) {
        // console.log(data);
        for (let i = 0; i < data.length; i++) {
          $("input[name='cup1']").val(data[0]);
          $("input[name='a3301']").val(data[1]);
          $("input[name='a5001']").val(data[2]);
          $("input[name='a6001']").val(data[3]);
          $("input[name='refill1']").val(data[4]);
        }
      }
    });
  });

  var i = 0;
  $('button[name="tambah_tujuan"]').on('click', function(e) {
    i++;
    var html = '';
    html += '<div id="rowbaru">';
    html += '<div class="card">';
    html += '<div class="card-header">';
    html += `<h4 id="new_tujuan" class="card-title">Tujuan ${i+1}</h4>`;
    html += '<button type="button" name="hapus_tujuan" class="btn btn-danger btn-sm float-right">';
    html += '<i class="fa fa-trash"></i>';
    html += '</button>';
    html += '</div>';
    html += '<div class="card-body">';
    html += '<div class="row">';
    html += '<div class="col-md-4">';
    html += '<div class="form-group">';
    html += '<label for="nama_pel_1">Distributor</label>';
    html += '<select name="nama_pel_1" class="form-control" required>';
    html += '<option value="">--Pilih Nama Distributor--</option>';
    html += '<?php $stmt_distro->execute();
              while ($row_distro = $stmt_distro->fetch(PDO::FETCH_ASSOC)) { ?>';
    html += '<option value="<?= $row_distro['id'] ?>"><?= $row_distro['nama'] . " - " . $row_distro['id_da'] . "(" . $row_distro['jarak'] . ")" . "km" ?> </option>';
    html += '<?php } ?>';
    html += '</select>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-4">';
    html += '<div class="form-group">';
    html += '<label for="pesanan">Pesanan</label>';
    html += '<select id="listorder" name="pesanan" class="form-control" required>';
    html += '<option value="">--Pilih Order--</option>';
    html += '</select>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-4">';
    html += '<div class="form-group">';
    html += '<label for="tgl_order">Tanggal Order</label>';
    html += '<input type="text" class="form-control" name="tgl_order" readonly>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '<div class="row">';
    html += '<div class="col-md">';
    html += '<div class="form-group">';
    html += '<label for="cup1">Muatan Cup</label>';
    html += '<input type="number" name="cup1" class="form-control" readonly>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md">';
    html += '<div class="form-group">';
    html += '<label for="a3301">Muatan A330</label>';
    html += '<input type="number" name="a3301" class="form-control" readonly>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md">';
    html += '<div class="form-group">';
    html += '<label for="a5001">Muatan A500</label>';
    html += '<input type="number" name="a5001" class="form-control" readonly>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md">';
    html += '<div class="form-group">';
    html += '<label for="a6001">Muatan A600</label>';
    html += '<input type="number" name="a6001" class="form-control" readonly>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md">';
    html += '<div class="form-group">';
    html += '<label for="refill1">Muatan Refill</label>';
    html += '<input type="number" name="refill1" class="form-control" readonly>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';

    $('#new').append(html);
  });

  $(document).on('click', 'button[name="hapus_tujuan"]', function() {
    $(this).closest('#rowbaru').remove();
    $('div div div div h4#new_tujuan').each(function(index){
      $(this).text("Tujuan " + (index + 1))
    });
    i--;
  });
</script>
<!-- /.content -->