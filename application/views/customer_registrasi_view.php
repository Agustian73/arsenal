<style>
	table, td, th{
	border-collapse: collapse;
	border: 1px solid #cecece;
	padding: 4px;
	font-size: 11.5px;
	}
</style>
<p class="title">Registrasi Customer</p>
<div><?php echo validation_errors();?></div>
<table>
	<?php echo form_open('customer/registrasi');?>
	<tr>
		<td><?php echo form_label('Nama', 'nama');?></td>
		<td><?php echo form_input(array('name'=> 'nama', 'id'=> 'nama', 'size'=> '25' ));?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Alamat', 'alamat');?></td>
		<td><?php echo form_textarea(array('name'=> 'alamat', 'id'=>'alamat', 'cols'=>'27', 'rows'=> '5'));?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Telepon','telepon');?></td>
		<td><?php echo form_input(array('name'=> 'telepon', 'id'=>'telepon', 'size'=> '25'));?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Email','email');?></td>
		<td><?php echo form_input(array('name'=> 'email', 'id'=> 'email','size'=>'25'));?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Password','password');?></td>
		<td><?php echo form_password(array('name'=> 'password', 'id'=> 'password','size'=>'25'));?></td>
	</tr>
	<tr>
		<td colspan="5">
			<?php echo form_submit(array('name'=> 'kirim', 'value'=>'Kirim', 'class'=> 'button'));?>
			<?php echo form_reset(array('name'=> 'batal', 'value'=>'Batal', 'class'=> 'button'));?>
		</td>
	</tr>
	</table>
	<?php echo form_close();?>