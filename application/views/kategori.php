<label for="select-language"> </label>
<select id="select-language" onchange="window.location.href=this.value">
	<option value="">Pilih Kategori Barang</option>
	<?php
		$query = mysql_query("SELECT * FROM kategori ORDER BY kategori_id DESC");
		while($d = mysql_fetch_array($query)):
	?>
	<option value="<?php echo base_url()?>index.php/barang/kategori/<?php echo $d['kategori_id'].'/'.$d['kategori_nama']?>"><?php echo $d['kategori_nama']?></option>
	<?php endwhile?>
</select>
