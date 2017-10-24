<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/18/2017
 * Time: 5:35 PM
 */

class order_db extends CI_Model
{
    public function place_order($bill, $order)
    {
        $this->db->trans_start();
        $this->db->insert('bills', $bill);

        $this->db->select_max('bill_no');
        $query = $this->db->get('bills')->result();  // Produces: SELECT MAX(bill_no) as bill_no FROM members

        $bill_no = $query[0]->bill_no;
        foreach ($order as $r):
            $r['bill_no'] = $bill_no;
            $this->db->insert('orders', $r);
            echo '<br>';
        endforeach;


        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE) {
            // generate an error... or use the log_message() function to log your error
            return 1;

        }
    }

    public function select_unverified_bills()
    {
        $this->db->select('b.bill_no, b.orderer, b.phone, b.shipping_address, b.billing_address');
        $this->db->from('bills as b');
//        $this->db->join('orders as o',"b.bill_no = o.bill_no" );
//        $this->db->join('items as i',"i.item_id = o.item_id" );
        $this->db->where('b.status=1');
        return $this->db->get()->result();
//        echo "<pre>";
//        print_r($res);
//        echo "</pre>";
    }

    public function select_verified_bills()
    {
        $this->db->select('b.bill_no, b.orderer, b.phone, b.shipping_address, b.billing_address');
        $this->db->from('bills as b');
        $this->db->join('delivery as d', "b.bill_no= d.bill_no", 'left outer');
        $this->db->where('d.bill_no IS NULL', NULL);
        $this->db->where('b.status=2');
        return $this->db->get()->result();
    }

    public function payment_pending_orders()
    {
        $this->db->select('b.bill_no, b.orderer, b.phone, b.shipping_address, b.billing_address');
        $this->db->from('bills as b');
        $this->db->where('b.status=3');
        return $this->db->get()->result();
    }

    public function select_orders($bill_no)
    {
        $this->db->select('b.bill_no, b.orderer, b.phone, b.shipping_address, b.billing_address, o.quantity,i.item_id, i.name, i.rate');
        $this->db->from('bills as b');
        $this->db->join('orders as o', "b.bill_no = o.bill_no");
        $this->db->join('items as i', "i.item_id = o.item_id");
        $this->db->where('b.bill_no=', $bill_no);
        return $this->db->get()->result();

    }

    public function confirm_order($bill_no)
    {
        $data = array('status' => 2);
        $clause = array('bill_no' => $bill_no);
        $msg = $this->db->update('bills', $data, $clause);
        return $msg;
    }

    public function remove_order($bill_no)
    {
        $res = $this->db->delete('bills', array('bill_no' => $bill_no));
        return $res;
    }

    public function select_confirmed_orders($bill_no)
    {
        $this->db->select('b.bill_no, b.orderer, b.phone, b.shipping_address, b.billing_address, o.quantity, i.name, i.rate');
        $this->db->from('bills as b');
        $this->db->join('orders as o', "b.bill_no = o.bill_no");
        $this->db->join('items as i', "i.item_id = o.item_id");
        $this->db->where('b.bill_no=', $bill_no);
        $this->db->where('b.status=', 2);
        return $this->db->get()->result();

    }

    public function assign_delivery_group($bill_no, $group_id)
    {
        $data = array(
            'bill_no' => $bill_no,
            'delivery_group_id' => $group_id
        );

        $row = $this->db->insert('delivery', $data);
        if ($row == true) {
            $this->session->set_flashdata('success', "The order has been assigned to your group");
        } else {
            $this->session->set_flashdata('fail', "Something went wrong");
        }
    }

    public function select_group_tasks($group_id)
    {
        $this->db->select('b.bill_no, b.orderer, b.phone, b.shipping_address, b.billing_address');
        $this->db->from('bills as b');
        $this->db->join('delivery d', 'b.bill_no = d.bill_no');
        $this->db->join('working_groups g', 'd.delivery_group_id = g.group_id');
        $this->db->where('b.status', 2);
        $this->db->where('d.delivery_group_id', $group_id);

        return $this->db->get()->result();
    }

    public function mark_as_delivered($bill_no)
    {
        $date = date('Y-m-d');
        $this->db->where('bill_no', $bill_no);
        $res = $this->db->update('bills', array('status' => 3, 'delivery_date' => $date));
        if ($res == 1) {
            $this->session->set_flashdata('success', 'The bill is marked as delivered');
        } else {
            $this->session->set_flashdata('fail', 'Something went wrong');

        }
    }

    public function mark_as_payed($bill_no)
    {
        $this->db->where('bill_no', $bill_no);
        $res = $this->db->update('bills', array('status' => 4, ));
        if ($res == 1) {
            $this->session->set_flashdata('success', 'The bill is marked as delivered');
        } else {
            $this->session->set_flashdata('fail', 'Something went wrong');
        }
    }
}