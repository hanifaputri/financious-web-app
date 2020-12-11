<?php

class GantiPassword extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('hak_akses')){
            $this->session->set_flashdata('pesan','
                <div class="alert alert-danger" role="alert">
                <span>Anda belum login!</span> 
                </div>
            ');
            redirect('welcome');
        }
    }

    public function index()
    {
        $data['title'] = "Ganti Password";

        if ($this->session->userdata('hak_akses')=='1'){
            $this->load->view('header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('formGantiPassword', $data);
            $this->load->view('footer');
        } else {
            $this->load->view('header', $data);
            $this->load->view('templates_pegawai/sidebar');
            $this->load->view('formGantiPassword', $data);
            $this->load->view('footer');
        }

    }

    public function gantiPasswordAksi()
    {
        $passLama = $this->input->post('passLama');
        $passBaru = $this->input->post('passBaru');
        $ulangPass = $this->input->post('ulangPass');

        $this->form_validation->set_rules('passLama', 'password lama', 'required');
        $this->form_validation->set_rules('passBaru', 'password baru', 'required|matches[ulangPass]');
        $this->form_validation->set_rules('ulangPass', 'ulangi password', 'required');
        
        if ($this->form_validation->run()==FALSE){
            $data['title'] = "Ganti Password";
    
            $this->load->view('header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('formGantiPassword', $data);
            $this->load->view('footer');
        } else {
            $data = array('password' => md5($passBaru));
            $id = array('id_pegawai' => $this->session->userdata('id_pegawai'));

            if ($this->penggajianModel->cek_password($id['id_pegawai'], $passLama)){
                $this->penggajianModel->update_data('data_pegawai', $data, $id);
                $this->session->sess_destroy();
                $this->session->set_flashdata('pesan','
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Password berhasil diganti. Silahkan login ulang.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
                redirect('welcome/login');
            } else {                
                $this->session->set_flashdata('pesan','
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Password salah, masukkan kembali.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
                redirect(base_url('gantiPassword'));
            }
        }
    }
}