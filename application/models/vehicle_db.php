<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/19/2017
 * Time: 1:50 PM
 */

class vehicle_db extends CI_Model
{
    //add new vehicle to system
    public function add_vehicle($data)
    {
        $res = $this->db->insert('vehicles', $data);
    }
    //remove existing vehicle from system
    public function remove_vehicle($vehicle_id)
    {
        $res = $this->db->delete('vehicles', array('vehicle_id' => $vehicle_id));
        if ($res == 1) {
            $this->session->set_flashdata('added', "The vehicle has been successfully deleted");
        }
    }
    //select all vehicles existing in the system
    public function select_vehicles()
    {
        $res = $this->db->get('vehicles')->result();
        return $res;
    }
}