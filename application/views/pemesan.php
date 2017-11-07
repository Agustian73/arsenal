<style>
	table, td, th{
	border-collapse: collapse;
	border: 1px solid #cecece;
	padding: 4px;
	font-size: 16px;
	margin:auto;
	}
	img{
		width:70px;
	}
	tr:hover{
    background-color:Salmon;
}
	.desk{
	width:250px;
	height:70px;
	overflow:auto; /* overflow akan membuat bisa di scroll */
}
</style>
<?php
if (empty($this->session->userdata('level') == 1) || (!is_login())){
?> <h2>anda tidak dapat mengakses halaman ini</h2><?php
}
else{?>
<h2>Daftar pemesan</h2>
<hr>
<table style="border-radius:10px 10px 10px 10px">
<tr style="background-color :SteelBlue" >
	<th>No</th>
	<th>Pemesan</th>
	<th>Alamat</th>
	<th>Telepon</th>
	<th>Tanggal pesan</th>
	<th colspan="2">Action</th>
</tr>
{barangs}
<tr>
	<td>{no_pesan}</td>
    	<td>{customer_nama}</td>   
	<td>{customer_alamat}</td>
	<td>{customer_telepon}</td>
    	<td>{cart_tanggal}</td>
     
    <td><?php echo anchor('barang/pesan_detail/{cart_nomor}', 'detail', array('class'=> 'button1'));?>|
      <?php  echo anchor("barang/delete_pemesan/{cart_nomor}", "<font class=button1>hapus</font>","OnClick='return Confirm_hapus()'");
    ?></td>
</tr>
{/barangs}
</table>
<script language="javascript">
	function Confirm_hapus(){
		if(confirm("KONFIRMASI PENGHAPUSAN DATA\nTekan OK untuk melanjutkan penghapusan data")==true){
			return true;
		}else{
			return false;
		}
	}
</script>
<?php } ?>
