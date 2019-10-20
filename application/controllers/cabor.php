<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cabor extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')){
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Cabang Olahraga';
        $data['site'] = 'Admin Site';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['cabor'] = $this->db->get('cabor')->result_array();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('cabor/index',$data);
        $this->load->view('templates/footer');
    }
    
    public function addCabor(){
        
        $data['title'] = 'Cabang Olahraga';
        $data['site'] = 'Admin Site';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        $data['cabor'] = $this->db->get('cabor')->result_array();
        
        $this->form_validation->set_rules('name_cabor', 'Nama Cabor', 'required');
        if($this->form_validation->run() == false){
            
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('cabor/index',$data);
            $this->load->view('templates/footer');
        
        }else{
            $this->db->insert('cabor', ['name_cabor' => $this->input->post(name_cabor)]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                    Data Cabor Berhasil Ditambahkan!
                    </div>');
                    redirect('cabor');
        }
    }

    public function edit($id){
        $data['title'] = 'Cabang Olahraga';
        $data['site'] = 'Admin Site';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Cabor_model');
        $data['cabor'] = $this->Cabor_model->getCabor($id);

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('cabor/edit',$data);
        $this->load->view('templates/footer');
    }
    
    public function editCabor(){
        
        $data['title'] = 'Cabang Olahraga';
        $data['site'] = 'Admin Site';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    

        $id = $this->input->post('id');
        $name_cabor = $this->input->post('name_cabor');

        $this->form_validation->set_rules('name_cabor', 'Nama Cabor', 'required');

        
        if ($this->form_validation->run() == false) {
            
            $this->load->model('Cabor_model');
            $data['cabor'] = $this->Cabor_model->getCabor($id);
        
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('cabor/edit',$data);
            $this->load->view('templates/footer');

        } else {

            $this->db->set('name_cabor', $name_cabor);
            $this->db->where('id', $id);
            $this->db->update('cabor');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Congratulation! your data Cabor has been updated!
            </div>');
            redirect('cabor');
        }
        


    }

    public function delete($id){
        
        $this->db->where('id', $id);
        $this->db->delete('cabor');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                Selamat ! Data Berhasil Dihapus.
                </div>');
                redirect('cabor');

    }

}