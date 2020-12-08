<?php

class SlipGaji extends CI_Controller {

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
        $data['title'] = "Cetak Slip Gaji Pegawai";
        $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filterSlipGaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetakSlipGaji()
    {
        $data['title'] = "Cetak Slip Gaji";
        $nik = $this->input->post('nik');
        $data['bulan'] = $this->input->post('bulan');
        $data['tahun'] = $this->input->post('tahun');
        $bulantahun = $data['bulan'].$data['tahun']; 
        $data['potongan_alpha'] = $this->db->query("SELECT jml_potongan FROM potongan_gaji WHERE potongan = 'Alpha'")->row();
        $data['print_slip'] = $this->db->query("
        SELECT
            data_pegawai.nik,
            data_pegawai.nama_pegawai,
            data_jabatan.nama_jabatan,
            data_jabatan.gaji_pokok,
            data_jabatan.tj_transport,
            data_jabatan.uang_makan,
            data_kehadiran.alpha
        FROM data_pegawai
        INNER JOIN data_kehadiran ON data_kehadiran.nik = data_pegawai.nik
        INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan
        WHERE data_kehadiran.bulan = '$bulantahun' 
              AND data_pegawai.nik = '$nik'
        ")->result();

        if (count($data['print_slip']) > 0) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('admin/cetakSlipGaji', $data);
        } else {
            $session = array(
                'bulan' => $data['bulan'],
                'tahun' => $data['tahun'],
                'pesan' => '<div class="alert alert-danger fade show" role="alert">
                            <strong>Karyawan Tidak Ditemukan.</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <hr>
                            <p class="mb-0">Mohon maaf data pada bulan dan tahun yang Anda pilih belum tersedia. Silahkan input absensi terlebih dahulu.</p>
                            </div>'
            );
            $this->session->set_flashdata($session);
            redirect('admin/slipGaji');
        }

    }
}