<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Customer_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }    
	public function select_member(){
        return $this->db->query("SELECT * FROM customer WHERE level=0 ORDER BY customer_id");        
	}
	public function select_where_tentang($tentang_id= ''){
        return $this->db->query("SELECT * FROM tentang WHERE tentang_id='".$tentang_id."'");        
	}
    public function insert($customer= array()){
		if(count($customer)>0){
			$this->db->insert('customer', $customer);
		}
	}
	
	public function select(){
		$this->db->select();
		$this->db->from('customer');
		return $this->db->get();
	}
	public function select_tentang(){
		$this->db->select();
		$this->db->from('tentang');
		return $this->db->get();
	}
	public function update_tentang($array = array()){
		$tentang_id		= $array['tentang_id'];
		$tentang_nama		= $array['tentang_nama'];
		$tentang_alamat		= $array['tentang_alamat'];
		$tentang_telepon	= $array['tentang_telepon'];
		$tentang_email		= $array['tentang_email'];
		$tentang_bank		= $array['tentang_bank'];
		$tentang_norek		= $array['tentang_norek'];
		$tentang_an		= $array['tentang_an'];
		$tentang_ket		= $array['tentang_ket'];

		$this->db->where('tentang_id', $tentang_id);		
		$this->db->set('tentang_nama', $tentang_nama);
		$this->db->set('tentang_alamat', $tentang_alamat);
		$this->db->set('tentang_telepon', $tentang_telepon);
		$this->db->set('tentang_email', $tentang_email);
		$this->db->set('tentang_bank', $tentang_bank);
		$this->db->set('tentang_norek', $tentang_norek);
		$this->db->set('tentang_an', $tentang_an);
		$this->db->set('tentang_ket', $tentang_ket);
		$this->db->update('tentang');
	}
	
	public function select_where($customer_email=null){
		$this->db->select();
		$this->db->from('customer');
		$this->db->where('customer_email', $customer_email);
		return $this->db->get();
	}

	public function select_admin($level=null){
		$this->db->select();
		$this->db->from('customer');
		$this->db->where('level', $level);
		return $this->db->get();
	}
	public function select_pemesan(){
		$this->db->select();
		$this->db->from('customer');
        	$this->db->join('cart', 'customer.customer_id = cart.customer_id');
        	return $this->db->get();
	}
	
	public function select_pesan(){
		$this->db->select();
		$this->db->from('customer');
        	$this->db->join('pesan', 'customer.customer_id = pesan.customer_id');
        	return $this->db->get();

	}
	public function select_detail($cart_nomor=null){
		$this->db->select();
		$this->db->from('barang');
        	$this->db->join('cart_detail', 'barang.barang_id = cart_detail.barang_id');
		$this->db->where('cart_detail.cart_nomor', $cart_nomor);
        	return $this->db->get();
	} 
	public function select_histori($customer_id=null){
		$this->db->select();
		$this->db->from('customer');
		$this->db->join('cart', 'customer.customer_id = cart.customer_id');
		$this->db->where('cart.customer_id', $customer_id);
        	return $this->db->get();
	}
/**	public function select_histori($customer_idr=null){
		$this->db->select();
		$this->db->from('barang');
        	$this->db->join('cart_detail', 'barang.barang_id = cart_detail.barang_id');
		$this->db->join('cart', 'cart_detail.cart_nomor = cart.cart_nomor');
		$this->db->join('customer', 'cart.customer_id = customer.customer_id');
		$this->db->where('cart_detail.cart_nomor', $cart_nomor);
        	return $this->db->get();
	}	*/

	public function insert_pesan($array = array()){
		$customer_id		= $array['customer_id'];
		$isi_pesan		= $array['isi_pesan'];
		
		$this->db->set('customer_id', $customer_id);
		$this->db->set('isi_pesan', $isi_pesan);
		$this->db->insert('pesan');
	}
	function hapus_pesan($id_pesan){
			$this->db->where('id_pesan', $id_pesan);
			$this->db->delete('pesan');
		}	
}
