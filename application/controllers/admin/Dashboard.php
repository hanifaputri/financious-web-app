<?php

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses')!='1'){
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
        $data['title'] = "Dashboard";
        
        $pegawai = $this->db->query("SELECT * FROM data_pegawai");
        $admin = $this->db->query("SELECT * FROM data_pegawai WHERE hak_akses = '1'");
        $jabatan = $this->db->query("SELECT * FROM data_jabatan");
        $kehadiran = $this->db->query("SELECT * FROM data_kehadiran");
       
        $data['jumlah_pegawai'] = $pegawai->num_rows();
        $data['admin'] = $admin->num_rows();
        $data['jabatan'] = $jabatan->num_rows();
        $data['kehadiran'] = $kehadiran->num_rows();
        $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();

        $this->load->view('header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('footer');
    }
}