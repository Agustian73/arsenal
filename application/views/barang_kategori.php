<style>
    .item_barang{
        width: 160px;
        border: 1px solid #cecece;
        display: inline-table;
        margin: 2px;
        padding: 2px;
    }    
    .item_barang img{
        width: 156px;
        height: 170px;
        display: block;
        margin: auto;
    }
</style>
<?php $kategori= $this->session->userdata('kategori_id');
?><h1><?php if($kategori == 1){echo "Means";}
	else if($kategori == 2){echo "Ladies";}
	else if($kategori == 3){echo "Kids";}
	else {echo "Asessories";}  ?></h1>
<hr>
{barangs}
<div class="item_barang">
    <p class="title">{barang_nama}</p>
    <?php echo img('images/produk/{barang_gambar}');?>
    <p class="title">Rp. {barang_harga}</p>
    <?php
        echo anchor('cart/add/{barang_id}', 'Beli', array('class'=> 'button'));
        echo anchor('barang/show_detail/{barang_id}', 'Detail', array('class'=> 'button'));
    ?>
</div>
{/barangs}
