<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
class Customer extends CI_Controller{
    function __construct() { 
        parent::__construct();
        $this->load->model('customer_model');
    }
    public function index(){
        $this->show();
    }
    public function show(){
        $this->load->library('form_validation');
        $content= array(
            'content'=> $this->load->view('customer_registrasi_view', '',true )
        );
        $this->parser->parse('template', $content);
    }
	public function pesan(){
		$this->load->helper(array('form', 'html', 'url', 'myhelper'));
		$data['pesan'] = '';
		$this->load->model('customer_model');
		if($this->input->post('Kirim')){
				$data['pesan'] = $this->customer_model->insert_pesan($this->input->post());
				/**$content = array('content'=>$this->parser->parse('pesan_customer', $data, true)
				);*/
				$content=array('content'=>"<h2>Pesan anda telah terkirim</h2>",$data, true
				);
				$this->parser->parse('template', $content);
				}else{
				$data['pesan'] = "";
				$content = array('content'=>$this->parser->parse('pesan_customer', $data, true)
				);
				$this->parser->parse('template', $content);
				}
			}
	public function tentang(){
	        $data = array('barangs' => $this->customer_model->select_tentang()->result_array());
		$content= array('content'=> $this->parser->parse('tentang', $data, true)
        );
        	$this->parser->parse('template', $content);
		}
	public function tentang_ubah($tentang_id = 1){
		$this->load->helper(array('form', 'html', 'url', 'myhelper'));
		$data['pesan'] = '';
		$this->load->model('customer_model');
				if($this->input->post('Ubah')){
				$data['pesan'] = $this->customer_model->update_tentang($this->input->post());
				$content=array('content'=>"<h2>Data berhasil di update</h2>",$data, true
				);
				$this->parser->parse('template', $content);
					}else{
					$data['pesan'] = "";
					$data = array('barangs' => $this->customer_model->select_where_tentang($tentang_id)->result_array());
					$content = array('content'=>$this->parser->parse('tentang_edit', $data, true)
					);
					$this->parser->parse('template', $content);
				}
			}
	public function terima_pesan(){
		
		$data = array('barangs' => $this->customer_model->select_pesan()->result_array());
		$no = 1;
		foreach($data['barangs'] as $key=>$value){
			$data['barangs'][$key]['no_pesan'] = $no++;
		}
		$content= array('content'=> $this->parser->parse('pesan_terima', $data, true)
        );
        	$this->parser->parse('template', $content);
		}
	public function delete_pesan($pesan_id){
		$this->customer_model->hapus_pesan($pesan_id);
		redirect(site_url('customer/terima_pesan'));
	}	
	public function member(){	
		$data = array('barangs' => $this->customer_model->select_member()->result_array());
		$no = 1;
		foreach($data['barangs'] as $key=>$value){
			$data['barangs'][$key]['no_pesan'] = $no++;
		}
		$content= array('content'=> $this->parser->parse('member', $data, true)
        );
        	$this->parser->parse('template', $content);
		}

	public function registrasi(){
        $this->load->library('form_validation');
		//setting rule
        $this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required/valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		//setting message
		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		$this->form_validation->set_message('valid_email', '%s bukan format email');
		if($this->form_validation->run()){
		$post= array(
			'customer_nama'=> $this->input->post('nama'),
			'customer_alamat'=> $this->input->post('alamat'),
			'customer_telepon'=> $this->input->post('telepon'),
			'customer_email'=> $this->input->post('email'),
			'customer_password'=> $this->encrypt->encode($this->input->post('password')),
			);
			$this->customer_model->insert($post);
			$content=array(
				'content'=> "<h2>Registrasi berhasil</h2>".$this->load->view('customer_login_view', '', true)
				);
		}else{
			$content=array(
				'content'=>$this->load->view('customer_registrasi_view', '',true)
			);
		}
		$this->parser->parse('template', $content);
	}
	public function form_login(){
		$content = array(
			'content'=>$this->load->view('customer_login_view', '', true).anchor(site_url('customer/registrasi'), '<p>Registrasi Customer</p>')
		);
		$this->parser->parse('template', $content);
	}
	function login(){
		$post = array(
			'customer_email'=>$this->input->post('email'),
			'customer_password'=>$this->input->post('password')
		);
		$result = $this->customer_model->select_where($post['customer_email'])->row_array();
		if ($result && $this->encrypt->decode($result['customer_password'])== $post['customer_password']){
			$session = array(
				'customer_id'=>$result['customer_id'],
				'customer_email'=>$result['customer_email'],
				'customer_nama'=>$result['customer_nama'],
				'level'=> $result['level'],
				'leve'=> $result['level'] == 1 ? "Admin" : "Customer"


			);
			$this->session->set_userdata($session);
			$content = array('content'=> $this->load->view('success_page', '', true));
			$this->parser->parse('template', $content);
		}else{
			$content = array('content'=> '<h2>Login Gagal</h2>'.$this->load->view('customer_login_view', '', true).anchor(site_url('customer/registrasi'), '<p>Registrasi Customer</p>')
			);
			$this->parser->parse('template', $content);
		}
	}
	function logout(){
		$this->session->unset_userdata('customer_id');
		$this->session->unset_userdata('customer_email');
		redirect();
	}
}
