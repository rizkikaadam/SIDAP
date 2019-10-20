<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabor_model extends CI_model
{
    public function getCabor($id){
        
        $query = "SELECT * FROM `cabor` WHERE `id` = $id";

        return $this->db->query($query)->result_array();
    }
    
}