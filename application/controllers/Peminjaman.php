<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('error',"Halaman tidak dapat diakses.");
            redirect('Login');
        }
        $this->load->model('M_peminjaman');
        $this->load->model('M_buku');
        $this->load->model('M_murid');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
	}

    public function index(){
        $data['Pinjam'] = $this->M_peminjaman->view_peminjaman()->result();

        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pages/peminjaman/v_peminjaman', $data);
    }

    public function create()
    {
        $get['kuda']  = date('Y-m-d');
        $get['d_murid']  =  $this->M_peminjaman->dd_murid();
        // $get = array(
        //     'd_murid' => $this->M_peminjaman->dd_murid(),
        //     'kuda'    => date("Y-m-d")
        // );

        // $this->form_validation->set_rules('buku_id_d','Buku', 'trim|is_unique[peminjaman_detail.buku_id_d]');
        $this->form_validation->set_rules('buku_id_d','Buku', 'trim');
        // $this->form_validation->set_message('is_unique', 'Maaf, %s tersebut sudah terpinjam');

        if ($this->form_validation->run() == FALSE) {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pages/peminjaman/add_peminjaman', $get);
        }else{
        $data = array(
            'nip_murid'              => $this->input->post('murid_nip'),
            'tgl_peminjaman'         => date("Y-m-d"),
            'tgl_pengembalian'       => $this->input->post('pengembalian_tgl')
        );
        $this->M_peminjaman->insert_peminjaman($data);
        $this->session->set_flashdata('success','Data Berhasil ditambah');
        
        redirect('Peminjaman');
    }
    }

    public function View_dt_pinjam($id_pinjam2=0)
    {
            /*data yang ditampilkan*/
            $id_pinjam1=$this->input->get('peminjaman_id');
            if ($id_pinjam1=='') {
                $id_pinjam1=$id_pinjam2;
            }
            if ($id_pinjam1!='') {
                $id = array('peminjaman_id' => $id_pinjam1);
                $this->session->set_userdata($id);
                $id_pinjam=$this->session->userdata('peminjaman_id');
                //echo $id_pinjam;
            }
            $data['data_buku'] = $this->M_buku->getAllData("buku");
            $data['data_murid'] = $this->M_murid->getAllData("murid");
            $data['data_pinjam'] = $this->M_peminjaman->get_detail1("peminjaman","peminjaman_id",$id_pinjam1);
            $data['data_detail_pinjam'] = $this->M_peminjaman->get_detail2("peminjaman_detail","pinjam_id",$id_pinjam1);
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('pages/peminjaman/detail_peminjaman', $data);
    }

    public function createdet()
    {
        $this->form_validation->set_rules('buku_id_d','Buku','is_unique[peminjaman_detail.buku_id_d]');

        $this->form_validation->set_message('is_unique', '%s sudah dipinjam, silahkan pilih yang lain');
        if ($this->form_validation->run()==false) {
                    $id_pinjam=$this->session->userdata('peminjaman_id');
                    /*data yang ditampilkan*/
                    $data['data_buku'] = $this->M_buku->getAllData("buku");
                    $data['data_murid'] = $this->M_murid->getAllData("murid");
                    $data['pinjam'] = $this->M_peminjaman->get_detail1("peminjaman","peminjaman_id",$id_pinjam);
                    $data['pinjam_detail'] = $this->M_peminjaman->get_detail1("peminjaman_detail","p_detail_id",$id_pinjam);
                    $this->load->view('template/header');
                    $this->load->view('template/sidebar');
                    $this->load->view('pages/peminjaman/add_peminjaman_detail', $data);
        }
        else
        {
            $id_pinjam=$this->session->userdata('peminjaman_id');
            $det= array('p_detail_id' => '',
                        'pinjam_id'=> $this->session->userdata('peminjaman_id'),
                        'buku_id_d'=> $this->input->post('buku_id_d'),
                        'flag'=> 2);
            $insert=$this->M_peminjaman->insert_peminjaman_dtl($det);
            $this->db->where('flag',2);
            $d1=$this->db->get('peminjaman_detail')->result();
            foreach ($d1 as $key1 => $value1)
            {
                $p_detail_id=$value1->p_detail_id;
            }
              $dataa1=array('p_detail_id' => $p_detail_id,
                            'buku_id_d' => $this->input->post('buku_id_d'));
                    $this->session->set_userdata($dataa1);
                    //update status jadi 0 lagi
                    $this->db->set('flag',0);
                    $this->db->where('p_detail_id',$this->session->userdata('p_detail_id'));
                    $this->db->update('peminjaman_detail');
                    redirect('Peminjaman/View_dt_pinjam/'.$id_pinjam,'refresh');
        }
    }
}