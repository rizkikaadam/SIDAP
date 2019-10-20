<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontingen_model extends CI_model
{
    public function getKontingenbyId($id){
        
        $query = "SELECT * FROM `kontingen` WHERE `id` = $id";

        return $this->db->query($query)->result_array();
    }
    
}