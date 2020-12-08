<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE){
			$data['title'] = "Login";
			$this->load->view('templates_admin/header', $data);
			$this->load->view('formLogin');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');	
			$cek = $this->penggajianModel->cek_login($username, $password);
	
			if ($cek == FALSE){          
				$this->session->set_flashdata('pesan','
					<div class="alert alert-danger" role="alert">
					<span>Username atau Password Salah!</span> 
					</div>
				');
				redirect('welcome');
			} else {
				// Session data
				$session_data = array (
					'hak_akses'		=> $cek->hak_akses,
					'nama_pegawai'	=> $cek->nama_pegawai,
					'id_pegawai'	=> $cek->id_pegawai,
					'nik'	=> $cek->nik,
					'photo'			=> $cek->photo
				);
				$this->session->set_userdata($session_data);
				
				switch ($cek->hak_akses){
					case '1': 
						redirect('admin/dashboard');
						break;
					case '2':
						redirect('pegawai/dashboard');
						break;
					default:
						break;
				}
			}
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username','required');
		$this->form_validation->set_rules('password', 'password','required');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
