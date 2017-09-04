<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends MX_Controller {

	public function index()
	{
        $data = [
            'id' => 1
        ];
        $this->load->model('Dashboard/Model_coba', 'kk');
		$this->blade->view('posts', $data);
	}
}
