<?php

class LaporanAbsensi extends CI_Controller{
    public function index()
    {
        $data['title'] = "Laporan Absensi";

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filterLaporanAbsensi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetakLaporanAbsensi()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulantahun = $bulan.$tahun;

        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['title'] = "Cetak Laporan Absensi";
        $data['lap_kehadiran'] = $this->db->query("
            SELECT * FROM data_kehadiran
            WHERE bulan = '$bulantahun'
            ORDER BY nama_pegawai ASC
        ")->result();

        if (count($data['lap_kehadiran']) > 0) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('admin/cetakLaporanAbsensi', $data);
        } else {
            $this->session->set_flashdata('pesan','
                <div class="alert alert-danger" role="alert">
                <strong>Data Tidak Ditemukan</strong> 
                <hr>
                <p>Mohon maaf data pada bulan dan tahun yang Anda pilih belum tersedia. Silahkan input absensi terlebih dahulu.</p>
                </div>
            ');
            redirect('admin/laporanAbsensi');
        }
    }
}