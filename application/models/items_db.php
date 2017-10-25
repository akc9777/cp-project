<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/18/2017
 * Time: 11:58 AM
 */

class items_db extends CI_Model
{
    //selects all the items in system
    public function select_items()
    {
        $res = $this->db->get('items')->result();
        return $res;
    }
    //selects orders that are ordered in a bill
    public function select_items_of_order($bill_no)
    {
        $this->db->select('o.item_id,o.quantity');
        $this->db->from('bills b');
        $this->db->join('orders o', "b.bill_no=o.bill_no");
        $this->db->where('o.bill_no', $bill_no);
        return $this->db->get()->result();
    }
    //adds new item to database
    public function add_item($data)
    {
        $res = $this->db->insert('items', $data);
        if ($res == true) {
            $this->session->set_flashdata('success', "Item is successfully added to the database");
        } else {
            $this->session->set_flashdata('fail', "Something went wrong.");
        }
    }
    //adds stock of existing items
    public function add_stock($item_id, $quantity)
    {
        $this->db->set('quantity', 'quantity + ' . (int)$quantity, FALSE);
        $this->db->where('item_id', $item_id);
        $res = $this->db->update('items');

        if ($res == true) {
            $this->session->set_flashdata('updated', "Item successfully stocked.");

        } else {
            $this->session->set_flashdata('fail', "Something went wrong.");

        }
    }
    //reduces stock of items
    public function decrease_stock($item_id, $quantity)
    {
        $this->db->set('quantity', 'quantity - ' . (int)$quantity, FALSE);
        $this->db->where('item_id', $item_id);
        $this->db->update('items');
    }
    //updates rate of items
    public function update_rate($item_id, $new_rate)
    {
        $this->db->set('rate', "$new_rate");
        $this->db->where('item_id', $item_id);
        $res = $this->db->update('items');

        if ($res == true) {
            $this->session->set_flashdata('updated', "Rate was successfully updated");

        } else {
            $this->session->set_flashdata('fail', "Something went wrong.");

        }
    }
}