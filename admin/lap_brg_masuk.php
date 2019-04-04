<?php 
include 'header.php';
include 'footer.php';
?>
<script type="text/javascript">
function printDiv(elemenId) {
var a = document.getElementById('print-area-2').value;
var b = document.getElementById(elemenId).innerHTML;
window.frames["print_frame"].document.title = document.title;
window.frames["print_frame"].document.body.innerHTML = '<style>' + a
+ '</style>' + b;
window.frames["print_frame"].window.focus();
window.frames["print_frame"].window.print();
}
</script>
<div class="panel panel-warning">
 <div class="panel-heading">
 <a href="javascript:printDiv('print-area-2');"
class="btn btn-primary btn-sm" ><i class="fa fa-print"></i> Print</a>
</div>
<div class="panel-body">
 <div class="well">
<div id="print-area-2">
<center>
<img src="../img/sintoga.png" width="90" align="right"><img
src="../img/provinsi.png" width="70" align="left"><h3 class="pageheader" style="text-align: center;">PEMERINTAH PROVINSI SUMATERA
BARAT <br>
DINAS PENDIDIKAN<br>
SMK NEGERI 1 Sintuk Toboh Gadang<br>
www.smkn1sintoga.com<br><img src="../img/row.png" width="700"></h3>
<h2 class="page-header" id="print-area-2">Laporan Data Barang
Masuk</h2>
<table class="table table-striped table-bordered table-hover"
border="1">
<tr align="center">
<th >No</th>
<th>Nama Barang</th>
<th>Spesifikasi</th>
<th>Tanggal Masuk</th>
<th>Jumlah Masuk</th>
<th>Supplier</th>
</tr>
</thead>
<tbody>
<?php
include '../koneksi.php';
$sql = mysqli_query($dbconnect,"select barang_masuk.*,
barang.id_barang, barang.nama_barang, barang.spesifikasi,
supplier.id_supplier, supplier.nama_supplier from barang inner join
(barang_masuk inner join supplier on
barang_masuk.id_supplier=supplier.id_supplier) on
barang.id_barang=barang_masuk.id_barang");
$a=1;
if ($sql === FALSE) {
die (mysqli_error($dbconnect));
} else {
while ($baris=mysqli_fetch_array($sql)){
?>
<tr align="center">
<td><?php echo $a++; ?></td>
<td><?php echo $baris['nama_barang'] ?></td>
<td><?php echo $baris['spesifikasi'] ?></td>
<td><?php echo $baris['tgl_masuk'] ?></td>
<td><?php echo $baris['jml_masuk'] ?></td>
<td><?php echo $baris['nama_supplier'] ?></td>
</tr>
<?php
}}
?>
</table>
</form>
</center>
<p></p>
<table>
	<tr><td width="800px">Mengetahui, </td><td>Sintuk Toboh
Gadang</td></tr>
 <tr><td height="">Kepala SMKN 1 Sintoga</td><td>Wakil
Sarana Prasarana </td></tr>
 <tr height="70px"></tr>
 <tr><td >Drs.Busraini</td><td>Anwar
Sadat,S.Pd,M.Pd.T</td></tr>
 <tr><td
>NIP.196411151988031003</td><td>NIP.197303242008011004</td></tr>
</table>
</div>
</div>
</div>
</div>
</div>
<iframe id="printing_frame" name="print_frame" src="about:blank"
style="display:none;"></iframe>