<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/19/2017
 * Time: 3:47 PM
 */

class group_db extends CI_Model
{
//creates group
    public function add_group($data)
    {
        $res = $this->db->insert('working_groups', $data);
    }

//returns group_id
    public function get_group_id($user_id)
    {
        $this->db->select('group_id');
        $this->db->from('working_groups');
        $this->db->where('driver_id', $user_id);
        $this->db->or_where('worker1_id', $user_id);
        $this->db->or_where('worker2_id', $user_id);
        $res = $this->db->get()->result();
        return $res[0]->group_id;
    }

//selects all the group
    public function select_groups()
    {
        $this->db->select('group_id,group_name');
        $this->db->from('working_groups');
        return $this->db->get()->result();
    }

//returns group data
    public function select_group_details()
    {
        $this->db->select('*');
        $this->db->from('working_groups');
        $res = $this->db->get()->result();

        foreach ($res as $r):
            //driver name fetch
            $driver_id = $r->driver_id;
            $this->db->select('name');
            $this->db->from('users');
            $this->db->where('user_id', $driver_id);
            $res1 = $this->db->get()->result();
            $r->driver_id = $res1[0]->name;
            //worker1 name fetch
            $worker1_id = $r->worker1_id;
            $this->db->select('name');
            $this->db->from('users');
            $this->db->where('user_id', $worker1_id);
            $res2 = $this->db->get()->result();
            $r->worker1_id = $res2[0]->name;
            //worker2 name fetch
            $worker2_id = $r->worker2_id;
            $this->db->select('name');
            $this->db->from('users');
            $this->db->where('user_id', $worker2_id);
            $res3 = $this->db->get()->result();
            $r->worker2_id = $res3[0]->name;
            //vehicle name fetch
            $vehicle_id = $r->vehicle_id;
            $this->db->select('registration_number');
            $this->db->from('vehicles');
            $this->db->where('vehicle_id', $vehicle_id);
            $res4 = $this->db->get()->result();
            $r->vehicle_id = $res4[0]->registration_number;
        endforeach;

        return $res;
    }


}