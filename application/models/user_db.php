<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/7/2017
 * Time: 12:30 PM
 */

class user_db extends CI_Model
{
    public function add_user($name, $email, $address, $phone,
                             $password, $ac_type, $citizenship)
    {
        $data = array(
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'phone' => $phone,
            'password' => md5($password),
            'user_type_id' => $ac_type,
            'citizenship' => $citizenship
        );
        if ($ac_type == 1) {
            $msg = $this->db->insert('users', $data);

        } else {
            $msg = $this->db->insert('users_temp', $data);
        }
        return $msg;
    }

    public function login_check($email, $code)
    {
        $data = array('email' => $email, 'password' => md5($code));
        $query = $this->db->get_where('users', $data);
        return $query->num_rows();
    }

    public function select_users()
    {
        $this->db->select('u.user_id, u.name, u.address, u.email, u.phone, ut.user_type');
        $this->db->from('users as u');
        $this->db->join('user_types as ut', 'ut.user_type_id = u.user_type_id');
        $this->db->where('u.user_type_id != 1');
        $query = $this->db->get();
        return $query->result();
    }

    public function select_staffs($staff_type)
    {

        $user_type_id = $staff_type;

        $this->db->select('u.user_id,u.name');
        $this->db->from('users u');
        $this->db->join('working_groups w', 'w.driver_id=u.user_id OR w.worker1_id=u.user_id OR w.worker2_id=u.user_id', 'left outer');
        $this->db->where('w.driver_id IS NULL', NULL);
        $this->db->where('w.worker1_id IS NULL', NULL);
        $this->db->where('w.worker2_id IS NULL', NULL);
        $this->db->where('u.user_type_id', $user_type_id);
        $query = $this->db->get()->result();
//        echo "<pre>";
//        print_r($query);
//        echo "</pre>";

        return $query;
    }

    public function select_unverified_users()
    {
        $this->db->select('u.user_id, u.name, u.address, u.email, u.phone, ut.user_type');
        $this->db->from('users_temp as u');
        $this->db->join('user_types as ut', 'ut.user_type_id = u.user_type_id');
        $this->db->where('u.user_type_id != 1');
        $query = $this->db->get();
//        echo '<pre>';
//        print_r($query->result());
//        echo '</pre>';
        return $query->result();
    }

    public function delete_unverified_user($id)
    {
        $this->db->delete('users_temp', array('user_id' => $id));
    }

    public function verify_user($id)
    {
        $this->db->select('u.name, u.address, u.email, u.phone, u.citizenship, u.password, u.user_type_id');
        $this->db->from('users_temp as u');
        $this->db->where('user_id', $id);
        $q = $this->db->get()->result();
        foreach ($q as $r) { // loop over results
            print_r($r);
            $this->db->insert('users', $r); // insert each row to users table
        }
//        delete entry from temporary table
        $this->db->delete('users_temp', array('user_id' => $id));
    }


    public function redundant_email_check($email)
    {
        $data = array('email' => $email);
        $query = $this->db->get_where('users', $data);
        $query1 = $this->db->get_where('users_temp', $data);
        if ($query1->num_rows() == 0 && $query->num_rows == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    public function redundant_phone_check($phone)
    {
        $data = array('phone' => $phone);
        $query = $this->db->get_where('users', $data);
        $query1 = $this->db->get_where('users_temp', $data);
        if ($query1->num_rows() == 0 && $query->num_rows == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    public function redundant_citizenship_check($citizenship)
    {
        $data = array('citizenship' => $citizenship);
        $query = $this->db->get_where('users', $data);
        $query1 = $this->db->get_where('users_temp', $data);
        if ($query1->num_rows() == 0 && $query->num_rows == 0) {
            return 0;
        } else {
            return 1;
        }

    }

    public function fetch_userdata($email)
    {
        $data = array('email' => $email);
        $query = $this->db->get_where('users', $data);
        return $query->result();
    }

    public function update_email($current_email, $email)
    {
        $data = array('email' => $email);
        $clause = array('email' => $current_email);
        $msg = $this->db->update('users', $data, $clause);
        return $msg;

    }

    public function update_address($current_email, $address)
    {
        $data = array('address' => $address);
        $clause = array('email' => $current_email);
        $msg = $this->db->update('users', $data, $clause);
        return $msg;

    }

    public function update_phone($current_email, $phone)
    {
        $data = array('phone' => $phone);
        $clause = array('email' => $current_email);
        $msg = $this->db->update('users', $data, $clause);
        return $msg;

    }

    public function update_password($email, $password)
    {
        $data = array('password' => md5($password));
        $clause = array('email' => $email);
        $msg = $this->db->update('users', $data, $clause);
        if ($msg == 1) {
            $this->session->set_flashdata('success', "Password has been updated");
        } else {
            $this->session->set_flashdata('fail', "Password could not be updated");

        }
    }
}