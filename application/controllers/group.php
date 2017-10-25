<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/19/2017
 * Time: 3:48 PM
 */

class group extends CI_Controller
{
    //adds new working group
    public function add_group()
    {
        $this->load->model('group_db');
        $this->load->model('vehicle_db');
        $this->load->model('user_db');

        $data['vehicles'] = $this->vehicle_db->select_vehicles();
        $data['drivers'] = $this->user_db->select_staffs(2);
        $data['workers'] = $this->user_db->select_staffs(3);
//        validation rules
        $this->form_validation->set_rules('group_name', 'Group Name', 'required|is_unique[working_groups.group_name]');
        $this->form_validation->set_rules('driver', 'Driver', 'required|is_unique[working_groups.driver_id]');
        $this->form_validation->set_rules('vehicle', 'Vehicle', 'required|is_unique[working_groups.vehicle_id]');
        $this->form_validation->set_rules('worker1', 'Worker1', 'required|is_unique[working_groups.worker1_id]|is_unique[working_groups.worker2_id]');
        $this->form_validation->set_rules('worker2', 'Worker2', 'required|is_unique[working_groups.worker1_id]|is_unique[working_groups.worker2_id]|callback__match[worker1]');
        if ($this->form_validation->run() == TRUE) {

            $group_name = $this->input->post('group_name');
            $vehicle = $this->input->post('vehicle');
            $driver = $this->input->post('driver');
            $worker1 = $this->input->post('worker1');
            $worker2 = $this->input->post('worker2');

            $data = array(
                'group_name' => $group_name,
                'vehicle_id' => $vehicle,
                'driver_id' => $driver,
                'worker1_id' => $worker1,
                'worker2_id' => $worker2
            );

            $this->group_db->add_group($data);
            $this->session->set_flashdata('group_success', 'The group has been created');

        }
        $this->load->view('corporate/owner/group/make_group', $data);
    }
    //loads details about existing group
    public function view_group()
    {
        $this->load->model('group_db');
        $group_detail['details'] = $this->group_db->select_group_details();
        $this->load->view('corporate/staff/group/view_group',$group_detail);
    }
    //checks if same user are selected twice during workgroup creation
    public function _match($worker2, $worker1)
    {
        if ($worker2 == $this->input->post('worker1')) {
            $this->form_validation->set_message('_match', "You can't choose the same worker twice");
            return false;
        } else {
            return true;
        }
    }
}