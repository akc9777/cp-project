<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/5/2017
 * Time: 7:08 PM
 */

class corporate extends CI_Controller
{
    //registration function
    public function register()
    {

        if (isset($_POST['register'])) {
            //Validation rules
            $this->form_validation->set_rules('ac_type', 'Account Type', 'required|callback_check_default');
            $this->form_validation->set_message('check_default', 'You need to select Account Type');
            $this->form_validation->set_rules('fullname', 'First Name', 'required');
//            $this->form_validation->set_rules('lname', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]|is_unique[users_temp.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required|min_length[8]|matches[password]');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required|is_unique[users.phone]|is_unique[users_temp.phone]');
            $this->form_validation->set_rules('citizenship', 'Citizenship Number', 'required|is_unique[users.citizenship]|is_unique[users_temp.citizenship]');

            // logic if validated
            if ($this->form_validation->run() == TRUE) {

                //get data from form
                $ac_type = $this->input->post('ac_type');
                $fullname = $this->input->post('fullname');
//                $lname = $this->input->post('lname');
                $email = $this->input->post('email');
                $address = $this->input->post('address');

                $phone = $this->input->post('phone');
                $password = $this->input->post('password');
                $citizenship = $this->input->post('citizenship');
                //Load Model
                $this->load->model('user_db');
                $msg = $this->user_db->add_user($fullname, $email, $address, $phone, $password, $ac_type, $citizenship);
                if ($msg == 1) {
                    $this->session->set_flashdata("loginsuccess", "Your account has been created. You can log in after you're verified by administrator");
                } else {
                    $this->session->set_flashdata("loginfail", "Something went wrong.Please try again");
                }
                redirect("corporate/login", "refresh");
            }
        }
        $this->load->view('corporate/signup_view');
    }
    //login function
    public function login()
    {
        if (isset($_POST['login'])) {
            //validation rules
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
            //if valid
            if ($this->form_validation->run() == TRUE) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                //send data to model
                $this->load->model('user_db');
                $query = $this->user_db->login_check($email, $password);
                //$ac_type= $this->user_db->account_type_check($email);

                if ($query == 1) {
//                    extract user id

                    $userdata['result'] = $this->user_db->fetch_userdata($email);

                    foreach ($userdata['result'] as $r):
                        $user_type = $r->user_type_id;
                        $user_id = $r->user_id;
                    endforeach;

                    $this->session->set_flashdata("loginsuccess", "You are logged in");
                    //set session

                    $this->session->set_userdata('email', $email);
                    $this->session->set_userdata('id', $user_id);
                    $this->session->set_userdata('data', $user_type);


                    redirect("corporate/dashboard", "refresh");
                } else {

                    $this->session->set_flashdata("loginfail", "We can't seem to find that email and password combination. Please try again");
                    redirect('corporate/login', 'refresh');
                }
            }
        }

        $this->load->view('corporate/signin_view');
    }

    //logout function
    public function logout()
    {
        $this->session->set_flashdata('loginsuccess', 'You are logged out.');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('data');
        $this->session->unset_userdata('id');
        redirect('corporate/login', 'refresh');
    }

    //dashboard display
    public function dashboard()
    {
        if (isset($_SESSION['email'])) {
            $this->load->view('corporate/dashboard');
        }
    }

    //shows user profile
    public function view_profile()
    {

        $this->load->model('user_db');
        $email = $this->session->email;

        $userdata_array['result'] = $this->user_db->fetch_userdata($email);

        $this->load->view('corporate/profile', $userdata_array);
    }

    //update email
    public function edit_email()
    {
        $this->load->model('user_db');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]|is_unique[users_temp.email]');
        $current_email = $this->session->email;
        $userdata_array['result'] = $this->user_db->fetch_userdata($current_email);

        $this->load->view('corporate/updates/update_email', $userdata_array);

        if ($this->form_validation->run() == true) {
            $email = $this->input->post('email');
            $msg_email = $this->user_db->update_email($current_email, $email);
            if ($msg_email == 1) {
                $this->session->set_flashdata('update_success', 'Email has been updated');
                $this->session->set_userdata('email', $email);
                redirect('corporate/view_profile', 'refresh');
            }
        }

    }

    //update phone number
    public function edit_phone()
    {
        $this->load->model('user_db');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|is_unique[users.phone]|is_unique[users_temp.phone]');
        $current_email = $this->session->email;
        $userdata_array['result'] = $this->user_db->fetch_userdata($current_email);
        if ($this->form_validation->run() == TRUE) {
            $phone = $this->input->post('phone');
            $msg_phone = $this->user_db->update_phone($current_email, $phone);

            if ($msg_phone == 1) {
                $this->session->set_flashdata('update_success', "Phone Number updated successfully");
                redirect("corporate/view_profile", "refresh");
            }

        }

        $this->load->view('corporate/updates/update_phone', $userdata_array);

    }

    //update user address
    public function edit_address()
    {
        $this->load->model('user_db');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $current_email = $this->session->email;
        $userdata_array['result'] = $this->user_db->fetch_userdata($current_email);
        $this->load->view('corporate/updates/update_address', $userdata_array);

        if ($this->form_validation->run() == TRUE) {
            $address = $this->input->post('address');
            $msg_address = $this->user_db->update_address($current_email, $address);

            if ($msg_address == 1) {
                $this->session->set_flashdata('update_success', "Address updated succesfully");
                redirect('corporate/view_profile', 'refresh');
            }
        }

    }
    //update password
    public function change_password()
    {


        $this->form_validation->set_rules('newpassword1', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('newpassword2', 'Confirm Password', 'required|min_length[8]|matches[newpassword1]');

        //if validated
        if ($this->form_validation->run() == TRUE) {
            $email = $_SESSION['email'];
            $new_password = $this->input->post('newpassword2');
            $this->load->model('user_db');
            $msg = $this->user_db->update_password($email, $new_password);

            if ($msg == 1) {
                $this->session->set_flashdata('success_pwd', "Password changed successfully");
            } else {
                $this->session->set_flashdata('fail_pwd', "Failed to change password");
            }
        }
        $this->load->view('corporate/change_password');
    }
    //adding new admin( can be done by existing admin)
    public function add_admin()
    {


        $this->form_validation->set_rules('fullname', 'First Name', 'required|alphanumeric');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|min_length[8]|matches[password]');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|is_unique[users.phone]');
        $this->form_validation->set_rules('citizenship', 'Citizenship Number', 'required|is_unique[users.citizenship]');

        if ($this->form_validation->run() == TRUE) {
            //get data from form
            $ac_type = 1;
            $fullname = $this->input->post('fullname');
            $email = $this->input->post('email');
            $address = $this->input->post('address');

            $phone = $this->input->post('phone');
            $password = $this->input->post('password');
            $citizenship = $this->input->post('citizenship');
            $this->load->model('user_db');
            $msg = $this->user_db->add_user($fullname, $email, $address, $phone, $password, $ac_type, $citizenship);

            if ($msg == 1) {
                $this->session->set_flashdata('success', "Admin created successfully");
            } else {
                $this->session->set_flashdata('ac_create_fail', "Failed to create admin account");
            }
        }
        $this->load->view('corporate/owner/add_admin');
    }
    //checking if selection is done in register page
    public function check_default($post_string)
    {
        return $post_string == '0' ? FALSE : TRUE;
    }
}