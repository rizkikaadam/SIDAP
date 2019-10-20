<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontingen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')){
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Kontingen';
        $data['site'] = 'Admin Site';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kontingen'] = $this->db->get('kontingen')->result_array();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('kontingen/index',$data);
        $this->load->view('templates/footer');
    }

    public function addKontingen(){
        $data['title'] = 'Kontingen';
        $data['site'] = 'Admin Site';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kontingen'] = $this->db->get('kontingen')->result_array();

        $this->form_validation->set_rules('name_kontingen','Nama Kontingen', 'required');
        $this->form_validation->set_rules('email','Email', 'required');

        if ($this->form_validation->run() == false) {
            
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('kontingen/index',$data);
            $this->load->view('templates/footer');

        } else {
            
            //cek adakah file yang di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/kontingen/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    
                    // cek apakah gambar lama ada atau tidak

                    
                    $new_image = $this->upload->data('file_name');

                    $insertKontingen = [
                        'logo' => $new_image,
                        'name_kontingen' => $this->input->post('name_kontingen'),
                        'address' => $this->input->post('address'),
                        'status' => 1,
                        'email' => $this->input->post('email')
                    ];
                    
    
                    $this->db->insert('kontingen',$insertKontingen);
                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                    Selamat ! Data Berhasil Ditambahkan.
                    </div>');
                    redirect('kontingen');


                } else {
                    echo $this->upload->display_errors();
                }
                

            } else {

                $insertKontingen = [
                    'name_kontingen' => $this->input->post('name_kontingen'),
                    'address' => $this->input->post('address'),
                    'status' => 1,
                    'email' => $this->input->post('email')
                ];
                

                $this->db->insert('kontingen',$insertKontingen);
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                Selamat ! Data Berhasil Ditambahkan.
                </div>');
                redirect('kontingen');
            }
            

        }
        

        
    }

    public function delete($id){
        
        $this->db->where('id', $id);
        $this->db->delete('kontingen');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                Selamat ! Data Berhasil Dihapus.
                </div>');
                redirect('kontingen');

    }

    public function detail($id){
        $data['title'] = 'Kontingen';
        $data['site'] = 'Admin Site';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        
        $this->load->model('Kontingen_model');
        $data['kontingen'] = $this->Kontingen_model->getKontingenbyId($id);

        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('kontingen/detail',$data);
        $this->load->view('templates/footer');
    }



    public function tampilEdit($id){
        $data['title'] = 'Kontingen';        
        $data['site'] = 'User Edit Site';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        
        $this->load->model('Kontingen_model');
        $data['kontingen'] = $this->Kontingen_model->getKontingenbyId($id);
            
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('kontingen/edit',$data);
            $this->load->view('templates/footer');

    }

    public function edit(){
        $data['title'] = 'Kontingen';        
        $data['site'] = 'User Edit Site';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        
        $id = $this->input->post('id');
        $this->load->model('Kontingen_model');
        $data['kontingen'] = $this->Kontingen_model->getKontingenbyId($id);

        $this->form_validation->set_rules('name_kontingen', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == false) {
            
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('kontingen/edit',$data);
            $this->load->view('templates/footer');

        }else{


            //cek jika ada gambar

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/kontingen/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    //cek gambar lama ada atau tidak

                    $old_image = $data['user']['image'];
                    
                    if ($old_image != 'default.jpg') {

                        //menghapus image lama yang berada pada direktori
                        unlink(FCPATH.'assets/img/profile/'. $old_image); //unlink : untuk menghapus, FCPATH : untuk url asal. 

                    }

                    $new_image = $this->upload->data('file_name');

                    $this->db->set('logo', $new_image);

                } else {
                    echo $this->upload->display_errors();
                }
                

            }
            

            $name_kontingen = $this->input->post('name_kontingen');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            
            
            $this->db->set('name_kontingen', $name_kontingen);
            $this->db->set('email', $email);
            $this->db->set('address', $address);
            $this->db->where('id', $id);
            $this->db->update('kontingen');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Congratulation! your data has been updated!
            </div>');
            redirect('kontingen');
        }
        
    }
    

}