<style>
     table, td, th{
		 border-collapse: collapse;
		 border: 1px solid #cecece;
		 padding: 4px;
		 font-size: 11.5px;
	 }
</style>
<p class="title">Keranjang Belanja</p>
<table>
    <tr>
	    <th>Kode</th>
	    <th>Nama</th>
	    <th>Qty</th>
	    <th>Harga</th>
	    <th>Jumlah</th>
	</tr>
	<?php echo form_open('cart/edit');?>
	{barangs}
	<?php echo form_hidden('rowid_{rowid}', '{rowid}');?>
	<tr>
	    <td>{id}</td>
	    <td>{name}</td>
	    <td><?php echo form_input(array('name'=> 'qty_{rowid}','value'=>'{qty}', 'size'=> '5'));?></td>
	    <td>{price}</td>
	    <td>{subtotal}</td>
	</tr>
	{/barangs}
	<tr>
	     <td colspan="4"><b>Total</b></td>
		 <td>{total}</td>
	</tr>
	<tr>
	    <td colspan="5"><?php echo form_submit(array('name'=> 'ubah', 'value'=> 'ubah', 'class'=>'button',));?></td>
	</tr>
	</table>
	
	<p><strong>Belanja? </strong><?php
	     echo anchor('barang/show', 'Lagi', array('class'=> 'button'));
	     echo anchor('cart/finished', 'Selesai', array('class'=> 'button'));
?></p>
<?php echo form_close();?>
		
