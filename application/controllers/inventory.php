<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/20/2017
 * Time: 6:42 PM
 */

class inventory extends CI_Controller
{
    public function add_item()
    {
        if (isset($_POST['add'])) {


            $this->form_validation->set_rules('item_name', 'Item Name', 'required|min_length[3]|max_length[15]|is_unique[items.name]');
            $this->form_validation->set_rules('rate', 'rate', 'required|max_length[6]|numeric');

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $_POST['item_name'],
                    'rate' => $_POST['rate']
                );
                $this->load->model('items_db');
                $this->items_db->add_item($data);
                redirect('inventory/add_item', 'refresh');
            }
        }
        $this->load->view('corporate/owner/inventory/add_items');
    }

    public function manage_item()
    {
        $this->load->model('items_db');
        $res['result'] = $this->items_db->select_items();
        $this->load->view('corporate/owner/inventory/item_view', $res);
    }

    public function decrease_stock($item_id, $quantity)
    {
        $this->load->model('items_db');
        $this->items_db->decrease_stock($item_id, $quantity);
    }

    public function add_stock($item_id)
    {
        if (isset($_POST['add'])) {
            $this->form_validation->set_rules('provider', 'Provider', 'required|alpha_numeric|max_length[50]');
            $this->form_validation->set_rules('bill_no', 'Bill Number', 'required|alpha_numeric|max_length[50]|is_unique[transactions.bill_no]');
            $this->form_validation->set_rules('item_stock', 'Item Stock', 'required|numeric|max_length[11]');
            $this->form_validation->set_rules('rate', 'required|numeric|max_length[6]');

            if ($this->form_validation->run() == TRUE) {
                $quantity = $_POST['item_stock'];
                $rate = $_POST['rate'];
                $party = $_POST['provider'];
                $bill_no = 'P_' . $_POST['bill_no'];
                $row = array(
                    'bill_no' => $bill_no,
                    'rate' => $rate,
                    'quantity' => $quantity,
                    'party' => $party,
                    'item_id' => $item_id,
                    'transaction_type' => 0
                );

                $this->load->model('transaction_db');
                $this->transaction_db->insert_transaction($row);

                $this->load->model('items_db');

                $this->items_db->add_stock($item_id, $quantity);
                redirect('inventory/manage_item', 'refresh');
            }
        }
        $this->load->view('corporate/owner/inventory/add_stock');
    }

    public function update_rate($item_id)
    {
        if (isset($_POST['update'])) {
            $this->form_validation->set_rules('item_rate', 'Item Rate', 'required|numeric|max_length[11]');
            //$this->form_validation->set_rules('rate', 'required|numeric|max_length[6]');

            if ($this->form_validation->run() == TRUE) {
                $rate = $_POST['item_rate'];
                $this->load->model('items_db');
                $this->items_db->update_rate($item_id, $rate);
                redirect('inventory/manage_item', 'refresh');
            }
        }
        $this->load->view('corporate/owner/inventory/update_rate');
    }
}