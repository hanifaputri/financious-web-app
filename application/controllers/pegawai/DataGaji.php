<?php

class DataGaji extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses')!='2'){
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
        $data['title'] = "Data Gaji";
        $id = $this->session->userdata('id_pegawai');
        $nik = $this->session->userdata('nik');
        $data['potongan_alpha'] = $this->db->query("SELECT jml_potongan FROM potongan_gaji WHERE potongan = 'Alpha'")->row();
        $data['gaji'] = $this->db->query("
        SELECT
            data_pegawai.nama_pegawai,
            data_pegawai.nik,
            data_jabatan.gaji_pokok,
            data_jabatan.tj_transport,
            data_jabatan.uang_makan,
            data_kehadiran.alpha,
            data_kehadiran.hadir,
            data_kehadiran.sakit,
            data_kehadiran.bulan,
            data_kehadiran.id_kehadiran
        FROM data_pegawai
        INNER JOIN data_kehadiran ON data_kehadiran.nik = data_pegawai.nik
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_pegawai.jabatan
        WHERE data_kehadiran.nik = '$nik'
        ORDER BY data_kehadiran.bulan DESC
        ")->result();

        $this->load->view('header', $data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/dataGaji', $data);
        $this->load->view('footer');
    }
    
    public function cetakSlip($id)
    {
        $data['title'] = "Cetak Slip Gaji";
        $data['potongan_alpha'] = $this->db->query("SELECT jml_potongan FROM potongan_gaji WHERE potongan = 'Alpha'")->row();
        $data['print_slip'] = $this->db->query("
        SELECT
            data_pegawai.nik,
            data_pegawai.nama_pegawai,
            data_jabatan.nama_jabatan,
            data_jabatan.gaji_pokok,
            data_jabatan.tj_transport,
            data_jabatan.uang_makan,
            data_kehadiran.alpha,
            data_kehadiran.bulan
        FROM data_pegawai
        INNER JOIN data_kehadiran ON data_kehadiran.nik = data_pegawai.nik
        INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan
        WHERE data_kehadiran.id_kehadiran = '$id' 
        ")->result();

        $this->load->view('header', $data);
        $this->load->view('pegawai/cetakSlipGaji', $data);
    }
}