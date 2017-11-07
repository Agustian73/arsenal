<style>
    .item_barang{
        width: 854px;
        margin: 2px;
        padding: 2px;
    }
    .item_barang img{
        width: 380px;        
        display: block;
        margin: auto;
    }
</style>
{barangs}
<div class="item_barang">
    <h2>{barang_nama}</h2>
    <strong>Kode: {barang_id}</strong>
    <img src="<?php echo base_url('images/produk/{barang_gambar}');?>" />
    <p class="title">Harga Rp. {barang_harga}</p>
    {barang_deskripsi}
    <p><?php
        echo anchor('cart/add/{barang_id}', 'Beli', array('class'=> 'button'));
        echo anchor('barang/show', 'Lainnya', array('class'=> 'button'));
    ?></p>
</div>
{/barangs}