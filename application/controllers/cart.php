<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
class Cart extends CI_Controller {
    function __construct() { 
        parent::__construct(); 
		$this->load->model('barang_model');
		$this->load->library("cart");
		$this->load->model('cart_model');
    }
    public function index(){
		
		$this->show();
    }
	public function add($barang_id){
		$rows=$this->barang_model->buy_select($barang_id) ->row_array();
		$data=array(
		'id'=> $rows['id'],
		'qty'=> 1,
		'price'=> $rows['price'],
		'name'=> $rows['name'],
		'options'=> array()
		);
		$this->cart->insert($data);
		$this->show();
	}
	public function edit(){
		$data=array();
		foreach($this->cart->contents() as $items){
			$data = array_merge(
						$data,
						array(
							array(
								 'rowid'=> $this->input->post('rowid_'.$items['rowid']),
								 'qty'=> $this->input->post('qty_'.$items['rowid'])
							)
						)
					);
		}
		$this->cart->update($data);
		$this->show();
	}
	public function show(){
		$cart=array(
			'barangs'=> $this->cart->contents(),
			'total'=> $this->cart->total()
		);
		$content=array(
			'content'=> $this->parser->parse('cart_view', $cart, true)	
		);
		$this->parser->parse('template', $content);
	}
	public function finished(){
		if(!is_login()){
			redirect('customer/form_login');
		}else{
			if(count($this->cart->contents())>0){
				$cart_number= $this->get_cart_number();
				$cart= array(
					'header'=>array(
						'cart_nomor'=>$cart_number,
						'customer_id'=>$this->session->userdata('customer_id'),
						'cart_tanggal'=>mdate("%Y-%m-%d %H:%i:%s", time())),
					'detail'=>array()
				);
				$i=0;
				foreach($this->cart->contents() AS $cart_detail){
					$cart['detail'][$i]['cart_nomor']=$cart_number;
					$cart['detail'][$i]['barang_id']=$cart_detail['id'];
					$cart['detail'][$i]['cart_barang_qty']=$cart_detail['qty'];
					$cart['detail'][$i]['cart_barang_harga']=$cart_detail['price'];
					$i++;
				}
				$this->cart_model->insert($cart);
				$this->cart->destroy();
				$content=array(
					'content'=>"<h2>Transaksi selesai, silahkan lakukan pembayaran</h2>"
				);
				$this->parser->parse('template', $content);
			}else{
				redirect();
			}
		}
	}
    public function how_shop(){
        $content= array(
            'content'=> $this->load->view('cara_belanja', '', true)
        );
        $this->parser->parse('template', $content);
    }
	private function get_cart_number(){
		$customer_id = $this->session->userdata('customer_id');
		$count_cart = $this->cart_model->select_where($customer_id)->num_rows()+1;
		$cart_number = $customer_id.$count_cart;
		return $cart_number;
	}
}
