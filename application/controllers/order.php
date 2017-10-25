<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/17/2017
 * Time: 8:35 PM
 */

class order extends CI_Controller
{
    //place order in the system
    public function place_order()
    {
        $this->load->model('items_db');
        $data['details'] = $this->items_db->select_items();

        $this->form_validation->set_rules('name', "Purchaser's Name", 'required');
        $this->form_validation->set_rules('shipping_address', 'Shipping Address', 'required');
        $this->form_validation->set_rules('billing_address', 'Billing Address', 'required');
        $this->form_validation->set_rules('phone', 'Billing Address', 'required');
        $this->form_validation->set_rules('item[]', 'Items', 'required');
        $this->form_validation->set_rules('quantity[]', 'Quanities', 'required');
        if ($this->form_validation->run() == TRUE) {


            $name = $this->input->post('name');
            $shipping_address = $this->input->post('shipping_address');
            $billing_address = $this->input->post('billing_address');
            $phone = $this->input->post('phone');
            $item = $this->input->post('item[]');
            $quantity = $this->input->post('quantity[]');


            $this->load->model('order_db');


            $bill_array = array(
                "orderer" => $name,
                "shipping_address" => $shipping_address,
                "billing_address" => $billing_address,
                "phone" => $phone,
            );
            $i = 0;
            foreach ($item as $itm):
//                echo $item[$i] . "," . $quantity[$i]."<br>";
                $temp = array(
                    "item_id" => $item[$i],
                    "quantity" => $quantity[$i]
                );
                $order_rows[] = $temp;
                $i++;
            endforeach;
            $msg = $this->order_db->place_order($bill_array, $order_rows);

            if ($msg == 1) {
                $this->session->set_flashdata('ordered', "The order has been successfully placed.");
            } else {
                $this->session->set_flashdata('not_ordered', "The order couldn't be placed.");
            }

        }
        $this->load->view('corporate/owner/order/place_order', $data);
    }

//    select orders that are only inserted
    public function view_unverified_order()
    {
        $this->load->model('order_db');
        $data['records'] = $this->order_db->select_unverified_bills();
        $this->load->view('corporate/owner/order/unverified_orders', $data);
    }

//selects orders with item details
    public function order_details($bill_no)
    {
        $this->load->model('order_db');
        $data['bill'] = $this->order_db->select_orders($bill_no);
        $this->load->view('corporate/owner/order/order_details', $data);

    }

//selects orders that are already delivered by havent been paid for
    public function payment_pending_orders()
    {

        $this->load->model('order_db');
        $data['bill'] = $this->order_db->payment_pending_orders();
        $this->load->view('corporate/owner/order/pending_payment_list', $data);
    }

//loads delivery data to worker page and asks for confirming delivery
    public function delivery_details($bill_no)
    {
        $this->load->model('order_db');
        $data['bill'] = $this->order_db->select_orders($bill_no);
        $this->load->view('corporate/staff/deliveries/delivery_details', $data);
    }

//shows data of a task among many task accepted by the group
    public function task_detail($bill_no)
    {
        $this->load->model('order_db');
        $data['bill'] = $this->order_db->select_orders($bill_no);
        $this->load->view('corporate/staff/group/order_detail', $data);
    }

//confirms that order is fulfille
    public function mark_as_delivered($bill_no)
    {
        $this->load->model('order_db');
        $this->order_db->mark_as_delivered($bill_no);
        redirect("order/group_delivery", 'refresh');
    }

//confirm unverified bill
    public function confirm_order($bill_no)
    {
        $this->load->model('order_db');
        $res = $this->order_db->confirm_order($bill_no);
        if ($res == 1) {
            $this->session->set_flashdata('confirmed', "The order has been confirmed");

        }
        redirect('order/view_unverified_order', 'refresh');
    }

//displays order lists
    public function deliver_order()
    {
        $this->load->model('order_db');

        $confirmed_bills['bills'] = $this->order_db->select_verified_bills();

        $this->load->view('corporate/staff/deliveries/confirm_deliveries', $confirmed_bills);
    }

//group takes responsibility of delivering the orders
    public function confirm_delivery($bill_no)
    {

        $user_id = $this->session->id;
        $this->load->model('group_db');
        $this->load->model('items_db');
        $this->load->model('order_db');
        $group_id = $this->group_db->get_group_id($user_id);

        $res = $this->items_db->select_items_of_order($bill_no);
        echo "<pre>";
        print_r($res);
        echo "</ pre>";
//decrease stock after accepting delivery
        foreach ($res as $r):
            $item_id = $r->item_id;
            $quantity = $r->quantity;
            $this->items_db->decrease_stock($item_id, $quantity);
        endforeach;


        $this->order_db->assign_delivery_group($bill_no, $group_id);
        redirect('order/deliver_order', 'refresh');

    }

//marks the bill amoount as paid
    public function confirm_payment($bill_no)
    {
        $this->load->model('order_db');
        $this->load->model('transaction_db');
        //adds transaction to transaction table
        $result = $this->order_db->select_orders($bill_no);
        foreach ($result as $res):
            $bill_num = $res->bill_no;
            $party = $res->orderer;
            $item_id = $res->item_id;
            $quantity = $res->quantity;
            $rate = $res->rate;

            $data = array(
                'bill_no' => $bill_num,
                'party' => $party,
                'item_id' => $item_id,
                'quantity' => $quantity,
                'rate' => $rate,
                'transaction_type' => 1
            );

            $this->transaction_db->insert_transaction($data);


        endforeach;


        $this->order_db->mark_as_paid($bill_no);
        redirect("order/payment_pending_orders", 'refresh');
    }

//lists all tasks that are taken by the group
    public function group_delivery()
    {
        $user_id = $this->session->id;
        $this->load->model('group_db');
        $group_id = $this->group_db->get_group_id($user_id);

        $this->load->model('order_db');
        $res['details'] = $this->order_db->select_group_tasks($group_id);
        $this->load->view('corporate/staff/group/group_task', $res);

    }
}