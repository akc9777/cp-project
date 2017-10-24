<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/21/2017
 * Time: 10:13 AM
 */

class transaction extends CI_Controller
{

    //takes data to be sent to model for insertion
    public function income_expenses_insight($filter, $days)
    {

    }

    public function show_insight()
    {
        $this->load->model('transaction_db');
        //gross income

        $res1_g_income_d = $this->transaction_db->income_expenses_insight(1, 1);//daily
        $res1_g_income_w = $this->transaction_db->income_expenses_insight(1, 7);//weekly
        $res1_g_income_m = $this->transaction_db->income_expenses_insight(1, 30);//monthly
        //gross expense
        $res2_g_expense_d = $this->transaction_db->income_expenses_insight(2, 1);//daily
        $res2_g_expense_w = $this->transaction_db->income_expenses_insight(2, 7);//weekly
        $res2_g_expense_m = $this->transaction_db->income_expenses_insight(2, 30);//monthly

        $i_d = $res1_g_income_d[0]->total;
        $i_w = $res1_g_income_w[0]->total;
        $i_m = $res1_g_income_m[0]->total;
        $e_d = $res2_g_expense_d[0]->total;
        $e_w = $res2_g_expense_w[0]->total;
        $e_m = $res2_g_expense_m[0]->total;

        $data['insight'] = array(
            'income_d' => $i_d,
            'income_w' => $i_w,
            'income_m' => $i_m,
            'expense_d' => $e_d,
            'expense_w' => $e_w,
            'expense_m' => $e_m
        );
        $this->load->view('corporate/owner/transactions/insight', $data);
    }
}