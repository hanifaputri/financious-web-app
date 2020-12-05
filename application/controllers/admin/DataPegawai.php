<?php

class dataPegawai extends CI_Controller {
    public function index()
    {
        $data['title'] = "Data Pegawai";
        $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('templates_admin/footer');
    
    }
    
    /*
    | -------------------------------------------------------------------
    |  Tambah Data
    | -------------------------------------------------------------------
    */
    public function tambahData()
    {
        $data['title'] = "Tambah Data Pegawai";
        $data['array_jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahPegawai', $data);
        $this->load->view('templates_admin/footer');
        
    }

    public function tambahDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->tambahData();
        } else {
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $jabatan = $this->input->post('jabatan');
            $status = $this->input->post('status');
            //Upload foto 
            $photo = $_FILES['photo']['name'];
            if ($photo = ''){} 
            else {
                $config['upload_path'] = realpath(FCPATH.'assets/photo/');
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo')){
                    echo "Photo gagal diupload.";
                } else {
                    $photo = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'jenis_kelamin' => $jenis_kelamin,
                'tanggal_masuk' => $tanggal_masuk,
                'jabatan' => $jabatan,
                'status' => $status,
                'photo' => $photo
            );
            
            $this->penggajianModel->insert_data('data_pegawai', $data);
            $this->session->set_flashdata('pesan','
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Pegawai Berhasil Ditambahkan!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            ');
            redirect('admin/dataPegawai');
        }
    }
 
    /*
    | -------------------------------------------------------------------
    |  Update Data
    | -------------------------------------------------------------------
    */
    public function updateData($id) 
    {
        $where = array('id_pegawai' => $id);
        $data['title'] = "Update Data Pegawai";
        $data['array_jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai = '$id'")->result();
        
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formUpdatePegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->tambahData();
        } else {
            $id = $this->input->post('id_pegawai');
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $jabatan = $this->input->post('jabatan');
            $status = $this->input->post('status');
            
            //Upload foto 
            $photo = $_FILES['photo']['name'];
            if ($photo){
                $config['upload_path'] = realpath(FCPATH.'assets/photo/');
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('photo')){
                    $photo = $this->upload->data('file_name');
                    $this->db->set('photo',$photo);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'jenis_kelamin' => $jenis_kelamin,
                'tanggal_masuk' => $tanggal_masuk,
                'jabatan' => $jabatan,
                'status' => $status
            );
            $where = array('id_pegawai' => $id);

            $this->penggajianModel->update_data('data_pegawai', $data, $where);
            $this->session->set_flashdata('pesan','
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Pegawai Berhasil Diupdate!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            ');
            redirect('admin/dataPegawai');
        }
    }

    /*
    | -------------------------------------------------------------------
    |  Hapus Data
    | -------------------------------------------------------------------
    */
    public function deleteData($id)
    { 
        $where = array('id_pegawai' => $id);
        $this->penggajianModel->delete_data('data_pegawai', $where);
        $this->session->set_flashdata('pesan','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
        ');
        redirect('admin/dataPegawai');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'nama pegawai', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal masuk', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required');
    }
}