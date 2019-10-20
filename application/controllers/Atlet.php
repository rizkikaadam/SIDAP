<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class atlet extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')){
            redirect('auth');
        }
        $this->load->model('Atlet_model', 'atlet');
    }

    public function index()
    {
        $data['title'] = 'Data Atlet';
        $data['site'] = 'SIDAP Site';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['atlet'] = $this->atlet->getAtlet();
        
        $data['cabor'] = $this->db->get('cabor')->result_array();
        $data['kontingen'] = $this->db->get('kontingen')->result_array();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('atlet/index',$data);
        $this->load->view('templates/footer');
    }

    public function detail($id){
        $data['title'] = 'Data Atlet';
        $data['site'] = 'SIDAP Site';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        $data['profile_atlet'] = $this->atlet->getProfile($id);
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('atlet/detail',$data);
        $this->load->view('templates/footer');
    }
    
    public function addAtlet(){
        
        $data['title'] = 'Data Atlet';
        $data['site'] = 'SIDAP Site';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
    
    
        $data['atlet'] = $this->atlet->getAtlet();

        $this->form_validation->set_rules('name', 'Name Atlet', 'required');
        $this->form_validation->set_rules('cabor_id', 'Cabang Olahraga', 'required');
        $this->form_validation->set_rules('kontingen_id', 'Kontingen', 'required');

        if ($this->form_validation->run() == false) {
            
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('atlet/index',$data);
            $this->load->view('templates/footer');

        } else {
            //cek apakah ada file yang di upload
            $upload_image = $_FILES['image']['name'];
            $new_image='default.jpg';

            if ($upload_image) {

                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/logo/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    
                    // cek apakah gambar lama ada atau tidak

                    $old_image = $data['atlet']['foto'];

                    if ($old_image != 'default.jpg') {
                        
                        //menghapus image lama 
                        unlink(FCPATH.'assets/img/profile/'.$old_image);

                    }

                    $new_image = $this->upload->data('name');

                } else {
                    echo $this->upload->display_errors();
                }
                
            } else {

                $insertAtlet = [
                    'foto' => $new_image,
                    'name' => $this->input->post('name'),
                    'tmp_lahir' => $this->input->post('tmp_lahir'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'address_atlet' => $this->input->post('address_atlet'),
                    'cabor_id' => $this->input->post('cabor_id'),
                    'kontingen_id' => $this->input->post('kontingen_id'),
                    'status' => 1
                ];

                $this->db->insert('atlet',$insertAtlet);
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                Selamat ! Data Berhasil DItambahkan.
                </div>');
                redirect('atlet');
                
            }
            
        }
        
        
        

    }

}