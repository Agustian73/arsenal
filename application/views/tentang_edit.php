<style>
	table, td, th{
	border-collapse: collapse;
	border: 1px solid #cecece;
	padding: 4px;
	font-size: 11.5px;
	}
</style>
<?php
if (empty($this->session->userdata('level') == 1) || (!is_login())){
?> <h2>anda tidak dapat mengakses halaman ini</h2><?php
}
else{?>
<p class="title">Profil kami</p>
<table>
{barangs}
<?php echo form_open('customer/tentang_ubah');?>
<?php echo form_hidden('tentang_id',1);?>
	<tr>
		<td><?php echo form_label('Nama toko', 'tentang_nama');?></td>
		<td><?php echo form_input(array('name'=>'tentang_nama','id'=>'tentang_nama','value'=>'{tentang_nama}','size'=>'25' ));?></td>
	</tr>

	<tr>
		<td><?php echo form_label('Alamat', 'tentang_alamat');?></td>
	<td><?php echo form_input(array('name'=>'tentang_alamat','id'=>'tentang_alamat','value'=>'{tentang_alamat}','size'=>'25' ));?></td>
	</tr>

	<tr>
		<td><?php echo form_label('No. Telepon', 'tentang_telepon');?></td>
	<td><?php echo form_input(array('name'=>'tentang_telepon','id'=>'tentang_telepon','value'=>'{tentang_telepon}','size'=>'25' ));?></td>
	</tr>

	<tr>
		<td><?php echo form_label('Email', 'tentang_email');?></td>
	<td><?php echo form_input(array('name'=>'tentang_email','id'=>'tentang_email','value'=>'{tentang_email}','size'=>'25' ));?></td>
	</tr>

	<tr>
		<td><?php echo form_label('Bank', 'tentang_bank');?></td>
	<td><?php echo form_input(array('name'=>'tentang_bank','id'=>'tentang_bank','value'=>'{tentang_bank}','size'=>'25' ));?></td>
	</tr>

	<tr>
		<td><?php echo form_label('No. Rekening', 'tentang_norek');?></td>
	<td><?php echo form_input(array('name'=>'tentang_norek','id'=>'tentang_norek','value'=>'{tentang_norek}','size'=>'25' ));?></td>
	</tr>

	<tr>
		<td><?php echo form_label('Atas Nama', 'tentang_an');?></td>
	<td><?php echo form_input(array('name'=>'tentang_an','id'=>'tentang_an','value'=>'{tentang_an}','size'=>'25' ));?></td>
	</tr>
	<tr>	
		<td><?php echo form_label('Tentang kami', 'tentang_ket');?></td>
	<td><?php echo form_textarea(array('name'=> 'tentang_ket', 'id'=>'tentang_ket','value'=>'{tentang_ket}', 'cols'=>'27', 'rows'=> '5'));?></td>
	</tr>
	<tr>
		<td colspan="2">
			<?php echo form_submit(array('name'=> 'Ubah', 'value'=>'Ubah', 'class'=> 'button'));?>
		</td>
	</tr>
<?php echo form_close();?>
{/barangs}
</table>
<?php } ?>
