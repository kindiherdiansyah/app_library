<?php 

class Murid extends CI_Controller{

    public function __construct(){
        parent::__construct();
    
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('gagal',"Halaman tidak dapat diakses.");
            redirect('Login');
        }
            
        $this->load->model('M_murid');   
    }

    public function index(){
        $data['Murid'] = $this->M_murid->view_murid()->result();
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pages/murid/v_murid', $data);
    }

    public function insert_murid()
    {
        $get = array(
            'jenis_murid' => $this->M_murid->get_jenis_murid()
        );

        $this->form_validation->set_rules('murid_nip','NIP Murid', 'trim|is_unique[murid.murid_nip]');

        $this->form_validation->set_message('is_unique', '%s sudah ada, silahkan ganti');
        
        if ($this->form_validation->run() == FALSE) {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pages/murid/add_murid');
        // $this->session->set_flashdata('error','Mohon lengkapi form');
        }else{
        $data = array(
            'murid_nip'         => $this->input->post('murid_nip'),
            'murid_nama'      => $this->input->post('murid_nama'),
            'murid_telp'      => $this->input->post('murid_telp'),
            'murid_email'     => $this->input->post('murid_email'),
            'murid_alamat'     => $this->input->post('murid_alamat')
        );
        $this->M_murid->insert_murid($data);
        $this->session->set_flashdata('success','Data Berhasil ditambah');
        
        redirect('Murid');
    }
    }

    public function update_murid($ID){

        $where = array('murid_nip' => $ID);
        
        $data['murid'] = $this->M_murid->edit_data_murid($where,'murid')->result();

        $this->form_validation->set_rules('murid_nip','NIP murid', 'trim');
        
        if ($this->form_validation->run() == FALSE) {

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pages/murid/edit_murid', $data);
        }else{
        $data = array(
            'murid_nip'         => $this->input->post('murid_nip'),
            'murid_nama'      => $this->input->post('murid_nama'),
            'murid_telp'      => $this->input->post('murid_telp'),
            'murid_email'     => $this->input->post('murid_email'),
            'murid_alamat'     => $this->input->post('murid_alamat')
        );

    $this->M_murid->update_data_murid($where,$data,'murid');
    $this->session->set_flashdata('success','Data Berhasil diubah');
    redirect('Murid');
    }
    }

    public function delete_murid($murid){
        $where = array('murid_nip' => $murid);

        $this->M_murid->hapus_murid($where,'murid');
        $this->session->set_flashdata('success','Data Berhasil dihapus');
        redirect('Murid');
    }
}