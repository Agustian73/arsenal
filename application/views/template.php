<html>
    <head>
        <title>Arsenal shop</title>
        <?php echo link_tag('assets/css/front.css');?>
    </head>
    <body>
        <div class="container" id="header">
		<h1 style="float:right"><?php $this->load->view('kategori')?></h1>
            <font size=22px>Arsenal Shop</font>
		
            
        </div>
        <div class="container">
            <ul id="menu" >
                <li><?php echo anchor(base_url(), 'Beranda');?></li>
                <li><?php echo anchor(site_url('cart/how_shop'), 'Cara Belanja');?></li>
		<li><?php echo anchor(site_url('customer/tentang'), 'Tentang');?></li>
		
				<li><?php
						if(!is_login()){
							echo anchor(site_url('customer/form_login'), 'Login');
						}else if($this->session->userdata('level') == 1){		
							echo anchor(site_url('barang/tambah'), 'Tambah Barang');
							echo anchor(site_url('barang/kelola'), 'Kelola Barang');
							echo anchor(site_url('customer/member'), 'Member');
							echo anchor(site_url('customer/terima_pesan'), 'Pesan customer');
							echo anchor(site_url('barang/pesan'), 'Pemesanan');
							echo anchor(site_url('customer/tentang_ubah'), 'OlShop');
							echo anchor(site_url('customer/logout'), 'Logout');
						}else{
							echo anchor(site_url('customer/pesan'), 'Pesan customer');
							echo anchor(site_url('barang/pesan_histori'), 'Histori pemesanan');
							echo anchor(site_url('customer/logout'), 'Logout');
						}
					?>
				</li>
<li><a style="float:right;padding-top: 0px;padding-right: 8px;" href="<?php echo site_url('cart'); ?>"><h4>Keranjang belanja (<?php echo $this->cart->total_items() ?>) <?php echo rupiah($this->cart->total())?></h4></a></li>
            </ul>
        </div>
        <div class="container">
		{content}
        </div>
        <div class="container" id="footer">
            <span><h3 align=center>Copyright &COPY; 2016 Noval Agustian Nim 13.230.0073 - All Rights Reserved</h3></span>
        </div>
    </body>
</html>
