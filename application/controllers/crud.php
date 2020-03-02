<?php 
 
 
class Crud extends CI_Controller{
	//memanggil function di m_data dan memanggil default url di autoload
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->helper('url');
 
	}
	//fungsi penghubung antara models pada m_data dan view pada v_tampil
	function index(){
		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil',$data);
	}
	//fungsi penghubung antara models pada m_data dan view pada v_input
	function tambah(){
		$this->load->view('v_input');
	}
	//berfungsi untuk meng-input data di models pada m_data dan meng-inputkan data ke database
	function tambah_aksi(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		$this->m_data->input_data($data,'user');
		redirect('crud/index');
	}
	//berfungsi untuk menghapus data di models pada m_data
	function hapus($id){
		$where = array('id' => $id);
		$this->m_data->hapus_data($where,'user');
		redirect('crud/index');
	}
 	//berfungsi untuk mengedit data di models pada
	function edit($id){
		$where = array('id' => $id);
		$data['user'] = $this->m_data->edit_data($where,'user')->result();
		$this->load->view('v_edit',$data);
	}
	//berfungsi untuk mengupdate data dari data sebelum nya
	function update(){
		//menangkap data dari form edit
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
		
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
		);
	 	//variable where yang menjadi penentu data yang akan di update(id yang di pilih)
		$where = array(
			'id' => $id
		);
	 
		$this->m_data->update_data($where,$data,'user');
		redirect('crud/index');
	}
}