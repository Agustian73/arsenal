<style>
	table, td, th{
	border-collapse: collapse;
	border: 1px solid #cecece;
	padding: 4px;
	font-size: 11.5px;
	}
	img{
		width:60px;
	}
</style>
<?php
if (empty($this->session->userdata('level') == 1) || (!is_login())){
?> <h2>anda tidak dapat mengakses halaman ini</h2><?php
}
else{
echo cetak_judul("Edit Produk",1,"class='header'",false);
echo isset($error) ? "File Upload Error ...":""; // operator ternary untuk mengecek eror
echo isset($upload_data) ? "File Berhasil di Upload : ".print_r($upload_data):""; ?>

<table>
{barangs}
<?php echo form_open_multipart(); ?>
<?php echo form_hidden('tentang_id',1);?>
	<tr>
		<td><?php echo form_label('ID Barang : ','barang_id');?></td>
<td><?php echo form_input(array('name'=>'barang_id','id'=>'barang_id','value'=>'{barang_id}','readonly' => 'readonly','size'=>'25'));?></td>
	</tr>

	<tr>
		<td><?php echo form_label('Nama Barang : ','barang_nama');?></td>
		<td><?php echo form_input(array('name'=>'barang_nama','id'=>'barang_nama','value'=>'{barang_nama}','size'=>'25'));?></td>
	</tr>
	
	<tr>
		<td><?php echo form_label('Harga : ','barang_harga');?></td>
<td><?php echo form_input(array('name'=>'barang_harga','id'=>'barang_harga','value'=>'{barang_harga}','size'=>'25', 'type'=>'number'));?></td>
	</tr>

	<tr>
		<td><?php echo form_label('Deskripsi : ','barang_deskripsi');?></td>
		<td><?php echo form_textarea(array('name'=>'barang_deskripsi','id'=>'barang_deskripsi','value'=>'{barang_deskripsi}','cols'=>'27', 'rows'=> '5'));?></td>
	</tr>
	
	<tr>
		<td><?php echo form_label('Status : ','barang_aktif');?></td>
		<?php $barang_aktif=array('1'=>'Aktif','0'=>'Non aktif',);?>
		<td><?php echo form_dropdown('barang_aktif',$barang_aktif,$select,'id="barang_aktif"','size=>25');?></td>
	</tr>
	
	<tr>
		<td><?php echo form_label('Kategori : ','kategori_id');?></td>
		<?php $kategori_id=array('1'=>	'Means','2'=>	'Ladies','3'=>	'Kids','4'=>'Asessories',);?>
		<td><?php echo form_dropdown('kategori_id',$kategori_id,$kategori,'id="kategori_id"','size=25');?></td>
	</tr>

	<tr>
		<td><?php echo form_label('Gambar : ','barang_foto');?></td>
	<td><?php echo img('images/produk/{barang_gambar}'); ?><br><br> <?php echo form_upload(array('name'=>'barang_foto','id'=>'barang_foto'));?></td>
	</tr>
	<tr>
		<td colspan="2">
			<?php echo form_submit('btnSubmit','Simpan'); echo nbs(6); echo form_reset('btnReset','Reset'); ?>
		</td>
	</tr>
<?php echo form_close();?>
{/barangs}
</table>
<?php } ?>
