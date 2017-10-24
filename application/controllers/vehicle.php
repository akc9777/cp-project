<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/19/2017
 * Time: 1:19 PM
 */

class vehicle extends CI_Controller
{
    //add and remove vehicles
    public function manage_vehicle()
    {
        $this->load->model('vehicle_db');
        $record_set['details'] = $this->vehicle_db->select_vehicles();
        //form validation
        $this->form_validation->set_rules('make', "Vehicle Make", 'required|max_length[50]');
        $this->form_validation->set_rules('model', "Vehicle Model", 'required|max_length[50]');

        $this->form_validation->set_rules('engine_no', "Vehicle Engine Number", 'required|max_length[50]|is_unique[vehicles.engine_no]');
        $this->form_validation->set_message('is_unique[vehicles.engine_no]', 'This engine number is already stored in system');

        $this->form_validation->set_rules('chasis_no', "Vehicle Chasis Number", 'required|max_length[50]|is_unique[vehicles.chasis_no]');
        $this->form_validation->set_message('is_unique[vehicles.chasis_no]', 'This chasis number is already stored in system');

        $this->form_validation->set_rules('number_plate', "Vehicle Registration Number", 'required|max_length[50]|is_unique[vehicles.registration_number]');
        $this->form_validation->set_message('is_unique[vehicles.chasis_no]', 'This registration number is already stored in system');

        //if form validated
        if ($this->form_validation->run() == TRUE) {

            $make = $this->input->post('make');
            $model = $this->input->post('model');
            $engine = $this->input->post('engine_no');
            $chasis = $this->input->post('chasis_no');
            $number_plate = $this->input->post('number_plate');

            $data = array(
                'make' => $make,
                'model' => $model,
                'engine_no' => $engine,
                'chasis_no' => $chasis,
                'registration_number' => $number_plate
            );
            $this->vehicle_db->add_vehicle($data);
            $this->session->set_flashdata('added', "Vehicle was successfully added to the system");
            redirect('vehicle/manage_vehicle', 'refresh');
        }
        //load view
        $this->load->view('corporate/owner/vehicle/manage_vehicle', $record_set);
    }

    //remove existing vehicles
    public function remove_vehicle($vehicle_id)
    {
        $this->load->model('vehicle_db');
        $this->vehicle_db->remove_vehicle($vehicle_id);
        redirect("vehicle/manage_vehicle", 'refresh');
    }
}