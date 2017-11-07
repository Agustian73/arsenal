<?php echo link_tag('assets/css/style.css');?>
<style>
     table, td, th{
		 border-collapse: collapse;
		 border: 1px solid #cecece;
		 padding: 4px;
		 font-size: 11.5px;
	 }
</style>
<?php
if (!is_login()){
?> <h2>anda tidak dapat mengakses halaman ini</h2><?php
}
else{?>
<h2>Detail Pesanan</h2>
<hr>
<table>
    <tr>
	    <th>No</th>
            <th>Foto barang</th>
	    <th>Kode</th>
	    <th>Nama</th>
	    <th>Qty</th>
	    <th>Harga</th>
	    <th>Jumlah</th>
	</tr>
	<?php $total = 0; $i = 1; foreach ($pesan_detail as $barang) { $no = $i++; ?>
	<tr>
	    <td><?php echo $no.'.';?></td>
            <td><?php
		$atrimg = array('src'=>'images/produk/'.$barang->barang_gambar,'width'=>100);
					echo img($atrimg);
				?></td>
	    <td><?php echo $barang->barang_id;?></td>
	    <td><?php echo $barang->barang_nama;?></td>
	    <td><?php echo $barang->cart_barang_qty;?></td>
	    <td><?php echo rupiah($barang->cart_barang_harga);?></td>
	    <td><?php
			$sub_jumlah = $barang->cart_barang_qty * $barang->cart_barang_harga;
			echo rupiah($sub_jumlah);
					?></td>
	</tr>
	<?php  $total = $total+$sub_jumlah; } ?>
	<tr>
	     <td colspan="6"><b>Total</b></td>
		 <td><?php
			echo rupiah($total); ?></td>
	</tr>
	
	</table>
<?php } ?>
