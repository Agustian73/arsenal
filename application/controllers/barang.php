<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
class Barang extends CI_Controller{
    function __construct() { 
        parent::__construct();
        $this->load->model('barang_model');
	$this->load->model('customer_model');
	}
	public function index(){
	        $this->show();
	}
	public function show(){
	        $data = array('barangs' => $this->barang_model->select()->result_array());
		$content= array('content'=> $this->parser->parse('barang_view', $data, true)
        );
        	$this->parser->parse('template', $content);
		}
	public function kategori($kategori_id = null){
	        $data = array('barangs' => $this->barang_model->select_kategori($kategori_id)->result_array()				
	);
			$this->session->set_userdata('kategori_id',$kategori_id);
		$content= array('content'=> $this->parser->parse('barang_kategori', $data, true)
        );
        	$this->parser->parse('template', $content);
		}
	public function kelola(){
		
		$jumlah= $this->barang_model->jumlah();
 
		$config['base_url'] = base_url().'index.php/barang/kelola/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 4; 				
		$dari = $this->uri->segment('3');
		
		/**$data = array('barangs' => $this->barang_model->lihat($config['per_page'],$dari));*/
		$data ['kelola'] = $this->barang_model->lihat($config['per_page'],$dari);

		$this->pagination->initialize($config); 
		
		/**$no = 1;
		foreach($data['barangs'] as $key=>$value){
			$data['barangs'][$key]['barang_no'] = $no++;
		}*/	
		
		$content= array('content'=> $this->parser->parse('barang_view_kelola', $data, true)
        );
        	$this->parser->parse('template', $content);
		}
	public function pesan(){
		
		$data = array('barangs' => $this->customer_model->select_pemesan()->result_array());
		$no = 1;
		foreach($data['barangs'] as $key=>$value){
			$data['barangs'][$key]['no_pesan'] = $no++;
		}
		$content= array('content'=> $this->parser->parse('pemesan', $data, true)
        );
        	$this->parser->parse('template', $content);
		}
	
	/**public function pesan_detail($cart_nomor= ''){
        	$data = array('barangs' => $this->customer_model->select_detail($cart_nomor)->result_array(),
				'total'=> $this->cart->total()
	);
		$no = 1;
		foreach($data['barangs'] as $key=>$value){
			$data['barangs'][$key]['no_pesan'] = $no++;
		}
		
        	$content= array('content'=> $this->parser->parse('pesan_detail', $data, true)
	        );
        	$this->parser->parse('template', $content);
	}*/
	public function pesan_detail($cart_nomor= ''){
        	$data ['pesan_detail'] = $this->customer_model->select_detail($cart_nomor)->result();
		$content= array('content'=> $this->parser->parse('pesan_detail', $data, true)
	        );
        	$this->parser->parse('template', $content);
	}
	public function pesan_histori($customer_id= ''){
		$data ['barangs'] = $this->customer_model->select_histori($this->session->userdata('customer_id'))->result();
		$content= array('content'=> $this->parser->parse('histori', $data, true)
	        );
        	$this->parser->parse('template', $content);
	}
	/** public function pesan_histori($customer_id= ''){
		$data ['histori'] = $this->customer_model->select_histori($this->session->userdata('customer_id'))->result();
		$content= array('content'=> $this->parser->parse('histori', $data, true)
	        );
        	$this->parser->parse('template', $content);
	} */
	
	public function tambah(){
		$this->load->helper(array('form', 'html', 'url', 'myhelper'));
		$data['pesan'] = '';
		$this->load->model('barang_model');
		if($this->input->post('btnSubmit')){
			$config['upload_path'] = './images/produk/';
			$config['allowed_types'] = 'gif|jpg|png'; //tipe gambar
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('barang_foto'))//kalau upload gagal
			{
				$error = array('error' => $this->upload->display_errors());
				$content = array('content'=>$this->parser->parse('barang_tambah', $error, true)
				);
				$this->parser->parse('template', $content);
			}else{
				$data = array('upload_data' => $this->upload->data());
				$data['pesan'] = $this->barang_model->insert($this->input->post(), $data);
				$content = array('content'=>$this->parser->parse('barang_tambah', $data, true)
				);
				$this->parser->parse('template', $content);
				}
			}else{
				$data['pesan'] = "";
				$content = array('content'=>$this->parser->parse('barang_tambah', $data, true)
				);
				$this->parser->parse('template', $content);
				}
			}
	public function show_detail($barang_id= ''){
        	$data = array('barangs' => $this->barang_model->select_where($barang_id)->result_array());
        	$content= array('content'=> $this->parser->parse('barang_detail_view', $data, true)
	        );
        	$this->parser->parse('template', $content);
	}
	public function ubah($barang_id = null){
		$this->load->helper(array('form', 'html', 'url', 'myhelper'));
		$data['pesan'] = '';
		$this->load->model('barang_model');
		if($this->input->post('btnSubmit')){
			$config['upload_path'] = './images/produk/';
			$config['allowed_types'] = 'gif|jpg|png'; //tipe gambar
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('barang_foto'))//kalau upload gagal
			{
				$data = null;
				$data['pesan'] = $this->barang_model->update($this->input->post(), $data);
				
				$this->kelola();
				
			}else{
				$data = array('upload_data' => $this->upload->data());
				$data['pesan'] = $this->barang_model->update($this->input->post(), $data);
				
				$this->kelola();
				
				}
			}else{
				$data['pesan'] = "";
				$data = array('barangs' => $this->barang_model->select_where($barang_id)->result_array());
				$data['select'] = $data['barangs'][0]['barang_aktif'];
				$data['kategori'] = $data['barangs'][0]['kategori_id'];
        	    		/**$content= array('content'=> $this->parser->parse('barang_detail_view', $data, true));*/
				
				$content = array('content'=>$this->parser->parse('barang_form_ubah', $data, true)
				);
				$this->parser->parse('template', $content);
				}
			}
	public function delete_barang($barang_id){
		$this->barang_model->delete($barang_id);
		redirect(site_url('barang/kelola'));
	}
	public function delete_pemesan($cart_nomor){
		$this->barang_model->delete_pesan($cart_nomor);
		redirect(site_url('barang/pesan'));
	}	

}
