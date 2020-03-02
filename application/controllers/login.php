<?php 
 //menampilkan form login dan melakukan verifikasi atau authentikasi username dan password yang di masukkan
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
 
	}
 
	function index(){
		$this->load->view('v_login');
	}
 
	function aksi_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => md5($password)
            );
        $cek = $this->m_login->cek_login("admin",$where)->num_rows();
        if($cek > 0){
     
            $data_session = array(
                'nama' => $username,
                'status' => "login"
                );
     
            $this->session->set_userdata($data_session);
     
            redirect(base_url("admin"));
        }else{
            echo "Username dan password salah !";
        }
    }
    //berfungsi untuk menghapus semua session dan login dengan Codeigniter 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}