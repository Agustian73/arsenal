<?php echo link_tag('assets/css/style.css');?>
<style>
     table, td, th{
		 border-collapse: collapse;
		 border: 1px solid #cecece;
		 padding: 4px;
		 font-size: 14px;
	 }
</style>
<?php
if (empty($this->session->userdata('level') == 0) || (!is_login())){
?> <h2>anda tidak dapat mengakses halaman ini</h2><?php
}
else{?>
<h2>Histori Pesanan</h2>
<hr>
<table>
    <tr>
	    <th>No</th>
	    <th>tanggal pemesanan</th>
	    <th colspan="2">Action</th>
	</tr>
	<?php $total = 0; $i = 1; foreach ($barangs as $barang) { $no = $i++; ?>
	<tr>
	    <td><?php echo $no.'.';?></td>           
	    <td><?php echo $barang->cart_tanggal;?></td>
	    <td><?php echo anchor('barang/pesan_detail/'.$barang->cart_nomor, 'detail', array('class'=> 'button1'));?></td>
	</tr>
	<?php } ?>
</table>
<?php } ?>
