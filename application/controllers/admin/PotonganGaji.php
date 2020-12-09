<?php

class PotonganGaji extends CI_Controller {

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
        $data['title'] = "Setting Potongan Gaji";
        $data['pot_gaji'] = $this->penggajianModel->get_data('potongan_gaji')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/potonganGaji', $data);
        $this->load->view('footer');
    }
    
    public function tambahData()
    {
        $data['title'] = "Tambah Potongan Gaji";

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahPotonganGaji', $data);
        $this->load->view('footer');
    }
    
    public function tambahDataAksi()
    {
        $potongan = $this->input->post('potongan');
        $jml_potongan = $this->input->post('jml_potongan');

        $data = array(
            'potongan'      => $potongan,
            'jml_potongan'  => $jml_potongan
        );

        $this->penggajianModel->insert_data('potongan_gaji', $data);
        
        $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
        ');
        redirect('admin/potonganGaji');
    }

    public function updateData($id)
    {
        $where = array('id' => $id);
        $data['potongan'] = $this->db->query("SELECT * FROM potongan_gaji WHERE id = '$id'")->result();
        $data['title'] = "Update Potongan Gaji";
        
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updatePotonganGaji', $data);
        $this->load->view('footer');
    }

    public function updateDataAksi()
    {
        $id = $this->input->post('id');
        $jenis_potongan = $this->input->post('potongan'); 
        $jml_potongan = $this->input->post('jml_potongan'); 
        
        $data = array(
            // Tabel        Alias
            'potongan' => $jenis_potongan,
            'jml_potongan' => $jml_potongan
        );

        $where = array(
            'id' => $id
        );

        $this->penggajianModel->update_data('potongan_gaji', $data, $where);
        $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
        ');
        redirect('admin/potonganGaji');
    }

    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->penggajianModel->delete_data('potongan_gaji', $where);
        $this->session->set_flashdata('pesan','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
        ');
        redirect('admin/potonganGaji');
    }
}