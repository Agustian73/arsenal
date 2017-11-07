<?php if( ! defined('BASEPATH')) exit ('No direct script access allowed');
class Cart_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	public function select(){
		$this->db->select();
		$this->db->from('cart');
		return $this->db->get();
	}
	
	public function select_where($customer_id=null){
		$this->db->select();
		$this->db->from('cart');
		$this->db->where('customer_id', $customer_id);
		return $this->db->get();
	}
	
	public function insert($cart=array()){
		if(count($cart>0)){
			$this->db->insert('cart', $cart['header']);
			$this->db->insert_batch('cart_detail', $cart['detail']);
		}
	}
}
