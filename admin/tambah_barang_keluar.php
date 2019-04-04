<?php
include 'header.php';
include 'footer.php';
include '../koneksi.php';
if(isset($_POST['simpan'])){
$id_brg_masuk = $_POST['id_brg_keluar'];
$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$tgl_masuk = $_POST['tgl_keluar'];
$jml_masuk = $_POST['jml_keluar'];
$id_supplier = $_POST['id_supplier'];
$dbconnect->query ("INSERT INTO sarpras_barang_keluar VALUES('$id_brg_keluar','$id_barang','$nama_barang', '$tgl_keluar','$jml_keluar','$id_supplier')")
or die (mysqli_error($dbconnect));
if($dbconnect) {
?>
<script language="javascript">
alert("Data Berhasil Ditambahkan");
window.location = "barang_keluar.php";
</script>
<?php
} else{
echo "Upss Something wrong..";
}
}
?>
<h3 class="page-header">Tambah Data Barang Masuk</h3>
<div class="col-lg-6">
<form role="form" action="" method="POST">
<input type="text" name="id_brg_keluar" hidden>
<div class="form-group">
<label>Nama barang</label>
<?php
include '../koneksi.php';
$result = mysqli_query($dbconnect,"select * from sarpras_barang");
$jsArray = "var prdName = new Array();\n";
echo '
<select class="form-control" name="nama_barang" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]">
<option name="nama_barang">Pilih Nama Barang</option>';
while ($row = mysqli_fetch_array($result)) {
echo '
<option value="' . $row['nama_barang'] . '">' . $row['nama_barang'] . '</option>';
$jsArray .= "prdName['" . $row['nama_barang'] . "'] = '" . addslashes($row['id_barang']) . "';\n";
}
echo '
</select>';
?>
</div>
<input type="text" name="id_barang" id="prd_name" value="<?php $row['id_barang']?>" hidden>
<script type="text/javascript">
<?php echo $jsArray; ?>
function changeValue(id_barang){
document.getElementById('prd_name').value = otoNam['id_barang'].id_barang;
} ;
</script>
<div class="form-group">
<label>Tanggal Masuk</label>
<div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
<input class="form-control" type="text" name="tgl_masuk" id="tanggal">
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
</div>
<div class="form-group">
<label>Jumlah</label>
<input class="form-control" type="text" name="jml_masuk" placeholder="Masukan Jumlah barang keluar">
</div>
<div class="form-group">
<label>Supplier</label>
<select name="id_supplier" class="form-control">
<option>Pilih Supplier</option>
<?php
include '../koneksi.php';
$result = mysqli_query($dbconnect,"select * from sarpras_supplier");
while ($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row['id_supplier']; ?>">
<?php echo $row['nama_supplier'];?>
</option>
<?php } ?>
?>
</select>
</div>
<div class="form-group">
<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
</div>
</div>
</form>
</div>
</div>
<?php
include 'footer.php';
?>