<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Barang_model extends CI_Model{
	function __construct(){
        parent::__construct();
    	}    
	public function select(){
        return $this->db->query("SELECT * FROM barang WHERE barang_aktif=1 ORDER BY barang_id");        
	}

	public function select_where($barang_id= ''){
        return $this->db->query("SELECT * FROM barang WHERE barang_id='".$barang_id."'");        
	}

	public function select_kategori($kategori_id= ''){
        return $this->db->query("SELECT * FROM barang WHERE kategori_id='".$kategori_id."'");        
	}
	/**public function select_kategori($kategori_id=null){
		$this->db->select();
		$this->db->from('barang');
		$this->db->join('kategori', 'barang.kategori_id = kategori.kategori_id');
		$this->db->where('barang.kategori_id', $kategori_id);
        	return $this->db->get();
	}*/

	public function buy_select($barang_id= ' '){
		$this->db->select("barang_id AS id, barang_harga AS price, barang_nama AS name");
		$this->db->from('barang');
		$this->db->where(array('barang_id'=> $barang_id, 'barang_aktif'=>'1'));
		return $this->db->get();
	}
	public function insert($array = array(), $data){
		$barang_id		= $array['barang_id'];
		$kategori_id		= $array['kategori_id'];
		$barang_nama		= $array['barang_nama'];
		$barang_harga		= $array['barang_harga'];
		$barang_deskripsi	= $array['barang_deskripsi'];
		$barang_gambar		= $data['upload_data']['file_name'];
		$barang_aktif		= '1';
		$this->db->set('barang_id', $barang_id);
		$this->db->set('kategori_id', $kategori_id);
		$this->db->set('barang_nama', $barang_nama);
		$this->db->set('barang_harga', $barang_harga);
		$this->db->set('barang_deskripsi', $barang_deskripsi);
		$this->db->set('barang_gambar', $barang_gambar);
		$this->db->set('barang_aktif', $barang_aktif);
		$this->db->insert('barang');
	}
	public function update($array = array(), $data){
		$barang_id		= $array['barang_id'];
		$kategori_id		= $array['kategori_id'];
		$barang_nama		= $array['barang_nama'];
		$barang_harga		= $array['barang_harga'];
		$barang_deskripsi	= $array['barang_deskripsi'];
		$barang_aktif		= $array['barang_aktif'];
		if($data != null){
			$barang_gambar		= $data['upload_data']['file_name'];
			$this->db->set('barang_gambar', $barang_gambar);
		}
		
		/**$barang_aktif		= '1';*/
		$this->db->where('barang_id', $barang_id);
		$this->db->set('kategori_id', $kategori_id);
		$this->db->set('barang_nama', $barang_nama);
		$this->db->set('barang_harga', $barang_harga);
		$this->db->set('barang_deskripsi', $barang_deskripsi);		
		$this->db->set('barang_aktif', $barang_aktif);
		$this->db->update('barang');
	}
	function delete($barang_id){
			$this->db->where('barang_id', $barang_id);
			$this->db->delete('barang');
		}
	function delete_pesan($cart_nomor){
			$this->db->where('cart_nomor', $cart_nomor);
			$this->db->delete('cart_detail');
			$this->db->where('cart_nomor', $cart_nomor);
			$this->db->delete('cart');
			
		}

	function lihat($sampai,$dari){
		return $query = $this->db->get('barang',$sampai,$dari)->result();		
	} 
	function jumlah(){
		return $this->db->get('barang')->num_rows();
	}
	
}
