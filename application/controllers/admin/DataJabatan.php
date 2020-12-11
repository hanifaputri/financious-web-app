<?php 

class dataJabatan extends CI_Controller {

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
        $data['title'] = "Data Jabatan";
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')
            ->result();

        $this->load->view('header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataJabatan', $data);
        $this->load->view('footer');
    
    }
  
    /*
    | -------------------------------------------------------------------
    |  Tambah Data
    | -------------------------------------------------------------------
    */
    public function tambahData()
    {
        $data['title'] = "Tambah Data Jabatan";
        $this->load->view('header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataJabatan', $data);
        $this->load->view('footer');
    }

    public function tambahDataAksi()
    {
        // Validasi data
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->tambahData();
        } else {
            $nama_jabatan = $this->input->post('nama_jabatan'); 
            $gaji_pokok = $this->input->post('gaji_pokok'); 
            $tj_transport = $this->input->post('tj_transport'); 
            $uang_makan = $this->input->post('uang_makan'); 
            
            $data = array(
                // Tabel        Alias
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
                'tj_transport' => $tj_transport,
                'uang_makan' => $uang_makan,
            );

            $this->penggajianModel->insert_data('data_jabatan', $data);
            $this->session->set_flashdata('pesan','
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Ditambahkan!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            ');
            redirect('admin/dataJabatan');
        }
    }
  
    /*
    | -------------------------------------------------------------------
    |  Update Data
    | -------------------------------------------------------------------
    */
    public function updateData($id)
    {
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan = '$id'")->result();
        $data['title'] = "Edit Data Jabatan";
        
        $this->load->view('header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataJabatan', $data);
        $this->load->view('footer');
    }

    public function updateDataAksi()
    {
        // Validasi data
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->updateData();
        } else {
            $id = $this->input->post('id_jabatan');
            $nama_jabatan = $this->input->post('nama_jabatan'); 
            $gaji_pokok = $this->input->post('gaji_pokok'); 
            $tj_transport = $this->input->post('tj_transport'); 
            $uang_makan = $this->input->post('uang_makan'); 
            
            $data = array(
                // Tabel        Alias
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
                'tj_transport' => $tj_transport,
                'uang_makan' => $uang_makan,
            );

            $where = array(
                'id_jabatan' => $id
            );

            $this->penggajianModel->update_data('data_jabatan', $data, $where);
            $this->session->set_flashdata('pesan','
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Diupdate!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            ');
            redirect('admin/dataJabatan');
        }
    }

    /*
    | -------------------------------------------------------------------
    |  Form Validation Rules
    | -------------------------------------------------------------------
    */
    public function _rules()
    {
        $this->form_validation->set_rules('nama_jabatan', 'nama jabatan', 'required');
        $this->form_validation->set_rules('gaji_pokok', 'gaji pokok', 'required');
        $this->form_validation->set_rules('tj_transport', 'tunjangan transport', 'required');
        $this->form_validation->set_rules('uang_makan', 'uang makan', 'required');
    }

    public function deleteData($id)
    { 
        $where = array(
            'id_jabatan' => $id
        );
        $this->penggajianModel->delete_data('data_jabatan', $where);

        $this->session->set_flashdata('pesan','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
        ');
        redirect('admin/dataJabatan');
    }


}