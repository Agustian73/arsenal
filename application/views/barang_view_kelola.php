<style>
	table, td, th{
	border-collapse: collapse;
	border: 1px solid #cecece;
	padding: 4px;
	font-size: 11.5px;
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
<h2>Kelola Produk</h2>
<hr>
<table style="border-radius:10px 10px 10px 10px">
<tr style="background-color :SteelBlue" >
	<th>No</th>	
	<th>Image</th>	
	<th>Kode</th>
	<th>Nama</th>
	<th>Deskripsi</th>
	<th>Harga</th>
	<th>Status</th>
	<th colspan="2">Action</th>
</tr>
<?php $i = 1; foreach ($kelola as $barang) { $no = $i++; ?>
<?php $status=$barang->barang_aktif;?>
<tr>
	<td><?php echo $no.'.';?></td>
	<td><?php echo img('images/produk/'.$barang->barang_gambar);?></td>	
	<td><?php echo $barang->barang_id;?></td>
    	<td><?php echo $barang->barang_nama;?></td>   
	<td><div  class="desk"><?php echo $barang->barang_deskripsi;?></div></td>    
	<td>Rp. <?php echo $barang->barang_harga;?></td>  
	<td><?php if($status == 1){echo "Aktif";} else{echo "Non aktif";} ?></td>
     
    <td><?php echo anchor('barang/ubah/'.$barang->barang_id, 'edit', array('class'=> 'button1'));?>|
      <?php  echo anchor('barang/delete_barang/'.$barang->barang_id , "<font class=button1>hapus</font>","OnClick='return Confirm_hapus()'");
    ?></td>
</tr>
<?php } ?>
</table>
<h2 align=center><?php echo $this->pagination->create_links();?></h2>
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
