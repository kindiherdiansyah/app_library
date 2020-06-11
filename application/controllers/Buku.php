<?php 

class Buku extends CI_Controller{

    public function __construct(){
        parent::__construct();
    
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('gagal',"Halaman tidak dapat diakses.");
            redirect('Login');
        }
            
        $this->load->model('M_buku');   
    }

    public function index(){
        $data['Buku'] = $this->M_buku->view_buku()->result();
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pages/buku/v_buku', $data);
    }

    public function insert_buku()
    {
        $get = array(
            'jenis_buku' => $this->M_buku->get_jenis_buku()
        );

        $this->form_validation->set_rules('buku_id','Kode Buku', 'trim|is_unique[buku.buku_id]');

        $this->form_validation->set_message('is_unique', '%s sudah ada, silahkan ganti');
        
        if ($this->form_validation->run() == FALSE) {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pages/buku/add_buku');
        // $this->session->set_flashdata('error','Mohon lengkapi form');
        }else{
        $data = array(
            'buku_id'         => $this->input->post('buku_id'),
            'buku_nama'      => $this->input->post('buku_nama'),
            'buku_qty'      => $this->input->post('buku_qty'),
            'buku_status'     => $this->input->post('buku_status')
        );
        $this->M_buku->insert_buku($data);
        $this->session->set_flashdata('success','Data Berhasil ditambah');
        
        redirect('Buku');
    }
    }

    public function update_buku($ID){

        $where = array('buku_id' => $ID);
        
        $data['buku'] = $this->M_buku->edit_data_buku($where,'buku')->result();

        $this->form_validation->set_rules('buku_id','Kode buku', 'trim');
        
        if ($this->form_validation->run() == FALSE) {

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pages/buku/edit_buku', $data);
        }else{
        $data = array(
            'buku_id'         => $this->input->post('buku_id'),
            'buku_nama'      => $this->input->post('buku_nama'),
            'buku_qty'      => $this->input->post('buku_qty'),
            'buku_status'     => $this->input->post('buku_status')
        );

    $this->M_buku->update_data_buku($where,$data,'buku');
    $this->session->set_flashdata('success','Data Berhasil diubah');
    redirect('Buku');
    }
    }

    public function delete_buku($buku){
        $where = array('buku_id' => $buku);

        $this->M_buku->hapus_buku($where,'buku');
        $this->session->set_flashdata('success','Data Berhasil dihapus');
        redirect('Buku');
    }
}