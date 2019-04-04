<?php
include 'header.php';
include 'footer.php';
include '../koneksi.php';
if(isset($_POST['simpan'])){
$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$spesifikasi = $_POST['spesifikasi'];
$lokasi = $_POST['lokasi'];
$kondisi = $_POST['kondisi'];
$jumlah = $_POST['jumlah'];
$sumber_dana = $_POST['sumber_dana'];
$dbconnect->query ("INSERT INTO sarpras_supplier VALUES('$id_supplier','$nama_supplier','$alamat_supplier', '$telp_supplier','$kota_supplier')")
or die (mysqli_error($dbconnect));
if($dbconnect) {
?>
<script language="javascript">
alert("Data Berhasil Ditambahkan");
window.location = "supplier.php";
</script>
<?php
} else{
echo "Upss Something wrong..";
}
}
?>
<h3 class="page-header">Tambah Supplier</h3>
<div class="col-lg-6">
<form role="form" action="" method="POST">
<input type="text" name="id_supplier" hidden>
<div class="form-group">
<label>No</label>
<input class="form-control" type="text" name="No" placeholder="Masukan Nomor" required>
</div>
<div class="form-group">
<label>ID Supplier</label>
<input class="form-control" type="text" name="Id_supplier" placeholder="Masukan ID Supplier">
</div>
<div class="form-group">
<label>Nama Supplier</label>
<input class="form-control" type="text" name="nama_supplier" placeholder="Masukan >Nama Supplier">
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label>Alamat Supplier</label>
<input class="form-control" type="text" name="alamat_supplier" placeholder="Masukan Alamat Supplier">
</div>
<div class="form-group">
<label>Telp Supplier</label>
<input class="form-control" type="text" name="telp_supplier" placeholder="Masukan Telp Supplier">
</div>
<div class="form-group">
<label>Kota Supplier</label>
<input class="form-control" type="text" name="kota_supplier" placeholder="Masukan Kota Supplier">
</div>
<div class="form-group">
<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
</div>
</div>
</form>
</div>
</div>