<?php 
include 'header.php';
?>

<h3>Rincian Barang</h3>

<?php
$id_brg=mysql_real_escape_string($_GET['id']);


$det=mysql_query("select * from barang where id='$id_brg'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Nama</td>
			<td><?php echo $d['nama'] ?></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td><?php echo $d['jenis'] ?></td>
		</tr>
		<tr>
			<td>Suplier</td>
			<td><?php echo $d['suplier'] ?></td>
		</tr>
		<tr>
			<td>Modal</td>
			<td><?php echo number_format($d['modal']); ?></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td><?php echo number_format($d['harga']) ?></td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td><?php echo $d['jumlah'] ?></td>
		</tr>
		<tr>
			<td>Sisa</td>
			<td><?php echo $d['sisa'] ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>