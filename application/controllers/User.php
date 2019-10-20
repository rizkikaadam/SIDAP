<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')){
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'My Profile';        
        $data['site'] = 'User Site';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('user/index',$data);
        $this->load->view('templates/footer');
    }

    public function Edit()
    {
        $data['title'] = 'Edit Profile';        
        $data['site'] = 'User Edit Site';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('name', 'Full name', 'required');

        if ($this->form_validation->run() == false) {
            
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('user/edit',$data);
            $this->load->view('templates/footer');

        }else{


            //cek jika ada gambar

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    //cek gambar lama ada atau tidak

                    $old_image = $data['user']['image'];
                    
                    if ($old_image != 'default.jpg') {

                        //menghapus image lama yang berada pada direktori
                        unlink(FCPATH.'assets/img/profile/'. $old_image); //unlink : untuk menghapus, FCPATH : untuk url asal. 

                    }

                    $new_image = $this->upload->data('file_name');

                    $this->db->set('image', $new_image);

                } else {
                    echo $this->upload->display_errors();
                }
                

            }
            

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            
            
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Congratulation! your data has been updated!
            </div>');
            redirect('user');
        }
        
    }

}
