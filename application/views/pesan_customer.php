<style>
	table, td, th{
	border-collapse: collapse;
	border: 1px solid #cecece;
	padding: 4px;
	font-size: 16px;
	}
</style>
<?php
if (empty($this->session->userdata('level') == 0) || (!is_login())){
?> <h2>anda tidak dapat mengakses halaman ini</h2><?php
}
else{?>
<p class="title">Pesan Customer</p>
<div><?php echo validation_errors();?></div>
<table>
	<?php echo form_open('customer/pesan');?>
	<?php echo form_hidden('customer_id',$this->session->userdata('customer_id'));?>
	<tr>
	<td><h3><?php echo form_label('Tulis pesan anda dibawah ini :', 'isi_pesan');?></h3></td>
	</tr>
	<tr>
		<td><?php echo form_textarea(array('name'=> 'isi_pesan', 'id'=>'isi_pesan', 'cols'=>'27', 'rows'=> '5'));?></td>
	</tr>
	<tr>
		<td colspan="5">
			<?php echo form_submit(array('name'=> 'Kirim', 'value'=>'Kirim', 'class'=> 'button'));?>
			<?php echo form_reset(array('name'=> 'batal', 'value'=>'Reset', 'class'=> 'button'));?>
		</td>
	</tr>
	</table>
	<?php echo form_close();?>
<?php } ?>
