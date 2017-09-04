<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends CI_Controller
{
    public function index()
    {
        $this->output->set_status_header('404');
        if($this->uri->segment(1) == ADMIN_PREFIX)
        {
            $this->load->view('errors/html/admin_error_404');//loading in custom error view
        }
        else
        {
            $this->load->view('errors/html/error_404');//loading in custom error view
        }
    }
}