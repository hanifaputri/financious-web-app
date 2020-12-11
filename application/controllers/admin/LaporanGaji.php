<?php

class LaporanGaji extends CI_Controller {

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
        $data['title'] = "Laporan Gaji Pegawai";

        $this->load->view('header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filterLaporanGaji', $data);
        $this->load->view('footer');
    }
    
    public function cetakLaporanGaji() 
    {
        $data['title'] = "Cetak Laporan Gaji Pegawai";
        $data['bulan'] = $this->input->post('bulan');
        $data['tahun'] = $this->input->post('tahun');
        $bulantahun = $data['bulan'].$data['tahun'];

        $data['potongan_alpha'] = $this->db->query("SELECT jml_potongan FROM potongan_gaji WHERE potongan = 'Alpha'")->row();
        $data['cetakGaji'] = $this->db->query("
        SELECT
            data_pegawai.nik,
            data_pegawai.nama_pegawai,
            data_pegawai.jenis_kelamin,
            data_jabatan.nama_jabatan,
            data_jabatan.gaji_pokok,
            data_jabatan.tj_transport,
            data_jabatan.uang_makan,
            data_kehadiran.bulan,
            data_kehadiran.alpha
        FROM data_pegawai
        INNER JOIN data_kehadiran ON data_kehadiran.nik = data_pegawai.nik
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_pegawai.jabatan
        WHERE data_kehadiran.bulan='$bulantahun'
        ORDER BY data_pegawai.nama_pegawai ASC
        ")->result();

        if (count($data['cetakGaji'])>0){
            $this->load->view('header', $data);
            $this->load->view('admin/cetakDataGaji', $data);
        } else {
            $this->session->set_flashdata('pesan','
                <div class="alert alert-danger" role="alert">
                <strong>Data Tidak Ditemukan</strong> 
                <hr>
                <p>Mohon maaf data pada bulan dan tahun yang Anda pilih belum tersedia. Silahkan input absensi terlebih dahulu.</p>
                </div>
            ');
            redirect('admin/laporanGaji');
        }

    }
}