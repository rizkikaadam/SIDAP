<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atlet_model extends CI_model
{
    public function getAtlet()
    {
        $query = "SELECT `atlet`.* , `kontingen`.`name_kontingen`, `cabor`.`name_cabor`
        FROM `atlet` JOIN `kontingen`
        ON `atlet`.`kontingen_id` = `kontingen`.`id`
        JOIN `cabor` ON `atlet`.`cabor_id` = `cabor`.`id`
        ";

        return $this->db->query($query)->result_array();
    }
    public function getProfile($id)
    {

        $query = "SELECT `atlet`.* , `kontingen`.`name_kontingen`
        FROM `atlet` JOIN `kontingen`
        ON `atlet`.`kontingen_id` = `kontingen`.`id`
        WHERE `atlet`.`id` = $id
        ";

        return $this->db->query($query)->result_array();
    
                
    }

    
}