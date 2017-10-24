<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/21/2017
 * Time: 10:14 AM
 */

class transaction_db extends CI_Model
{
    public function insert_transaction($data)
    {
        $this->db->insert('transactions', $data);
    }

    public function income_expenses_insight($filter, $days)
    {
        $this->db->select("SUM(rate*quantity) as total");
        $this->db->from('transactions');
        switch ($filter) {
            case 0:
                $this->db->where('transaction_type', "0");//sales
                break;
            case 1:
                $this->db->where('transaction_type', "1");//expense
                break;
        }

        $this->db->where('timestamp >', "DATE_SUB(now(), INTERVAL $days DAY");
        $res = $this->db->get()->result();
        return $res;
    }

}