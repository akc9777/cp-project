<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/9/2017
 * Time: 7:09 PM
 */

class admin extends CI_Controller
{
    public function view_staff()
    {
        $this->load->model('user_db');
        $staff_array['details'] = $this->user_db->select_users();
        $this->load->view('corporate/owner/view_staff', $staff_array);

    }

    public function view_unverified_staff()
    {
        $this->load->model('user_db');
        $staff_array['details'] = $this->user_db->select_unverified_users();
        $this->load->view('corporate/owner/view_unverified_staff', $staff_array);

    }

    public function delete_unverified_staff($id)
    {
        $this->load->model('user_db');
        $this->user_db->delete_unverified_user($id);
        redirect('admin/view_unverified_staff', 'refresh');
    }

    public function verify_confirmation($id)
    {
        $id_array['result'] = array('id' => $id);
        $this->load->view('corporate/owner/confirm_verification', $id_array);
    }

    public function verify_staff($id)
    {
        $this->load->model('user_db');
        $this->user_db->verify_user($id);
        redirect('admin/view_unverified_staff', 'refresh');
    }
}