<style>
	table, td, th{
	border-collapse: collapse;
	border: 1px solid #cecece;
	padding: 4px;
	font-size: 11.5px;
	}
</style>
<p class="title">Login</p>
<div><?php echo validation_errors();?></div>
<table>
	<?php echo form_open('customer/login');?>
	<tr>
		<td><?php echo form_label('Email','email');?></td>
		<td><?php echo form_input(array('name'=> 'email', 'id'=> 'email', 'size'=> '25'));?></td>
	</tr>
	<tr>
	<td><?php echo form_label('Password','password');?></td>
	<td><?php echo form_password(array('name'=> 'password', 'id'=>'password', 'size'=>'25'));?></td>
	</tr>
<tr>
	<td colspan="5">
	<?php echo form_submit(array('name'=> 'login', 'value'=>'Login', 'class'=> 'button'));?>
	<?php echo form_reset(array('name'=> 'batal', 'value'=>'Batal', 'class'=> 'button'));?>
		</td>
</tr>
</table>

<?php echo form_close();?>
