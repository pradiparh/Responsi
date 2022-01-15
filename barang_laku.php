<?php include 'header.php';	?>

<h3>Data Penjualan Barang</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">Tambah</button>
<form action="" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		
		<select type="submit" name="tanggal" class="form-control" onchange="this.form.submit()">
			<option></option>
			<?php 
			$pil=mysql_query("select distinct tanggal from barang_laku order by tanggal desc");
			while($p=mysql_fetch_array($pil)){
				?>
				<option><?php echo $p['tanggal'] ?></option>
				<?php
			}
			?>			
		</select>
	</div>

</form>
<br/>
<?php 
if(isset($_GET['tanggal'])){
	$tanggal=mysql_real_escape_string($_GET['tanggal']);
	$tg="lap_barang_laku.php?tanggal='$tanggal'";
	?><a style="margin-bottom:10px" href="<?php echo $tg ?>" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a><?php
}else{
	$tg="lap_barang_laku.php";
}
?>

<br/>
<?php 
if(isset($_GET['tanggal'])){
	echo "<h4> Data Penjualan Tanggal  <a style='color:blue'> ". $_GET['tanggal']."</a></h4>";
}
?>
<table class="table">
	<tr>
		<th>No</th>
		<th>Tanggal</th>
		<th>Nama Barang</th>
		<th>Harga Terjual</th>
		<th>Total Harga</th>
		<th>Jumlah</th>			
		<th>Laba</th>			
		<th>Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['tanggal'])){
		$tanggal=mysql_real_escape_string($_GET['tanggal']);
		$brg=mysql_query("select * from barang_laku where tanggal like '$tanggal' order by tanggal desc");
	}else{
		$brg=mysql_query("select * from barang_laku order by tanggal desc");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['tanggal'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo number_format($b['harga']) ?></td>
			<td><?php echo number_format($b['total_harga']) ?></td>
			<td><?php echo $b['jumlah'] ?></td>			
			<td><?php echo number_format($b['laba'])?></td>			
			<td>		
				<a href="edit_laku.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Hapus Data ini?')){ location.href='hapus_laku.php?id=<?php echo $b['id']; ?>&jumlah=<?php echo $b['jumlah'] ?>&nama=<?php echo $b['nama']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>

		<?php 
	}
	?>
	<tr>
		

		?>
	</tr>
	<tr>
		

		?>
	</tr>
</table>

<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Penjualan
				</div>
				<div class="modal-body">				
					<form action="barang_laku_act.php" method="post">
						<div class="form-group">
							<label>Tanggal</label>
							<input name="tgl" type="text" class="form-control" id="tgl" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Nama Barang</label>								
							<select class="form-control" name="nama">
								<?php 
								$brg=mysql_query("select * from barang");
								while($b=mysql_fetch_array($brg)){
									?>	
									<option value="<?php echo $b['nama']; ?>"><?php echo $b['nama'] ?></option>
									<?php 
								}
								?>
							</select>

						</div>									
						<div class="form-group">
							<label>Harga Terjual</label>
							<input name="harga" type="text" class="form-control" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Jumlah</label>
							<input name="jumlah" type="text" class="form-control" autocomplete="off">
						</div>																	

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>												
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tgl").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
	<?php include 'footer.php'; ?>