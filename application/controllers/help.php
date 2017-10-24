<?php
/**
 * Created by PhpStorm.
 * User: Abhisek
 * Date: 10/24/2017
 * Time: 10:59 AM
 */

class help extends CI_Controller
{
    public function admin_help()
    {
        echo $path = base_url() . "assets/help/admin_help.pdf";
        redirect("$path");

    }

    public function account_help()
    {
        $path = base_url() . "assets/help/account_help.pdf";
        redirect("$path");
    }

    public function staff_help()
    {
        $path = base_url() . "assets/help/staff_help.pdf";
        redirect("$path");
    }
}