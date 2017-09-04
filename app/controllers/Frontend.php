<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function index()
	{
        $data = [];
		$this->blade->view('homepage', $data);
	}

    public function _remap($method, $params = array())
    {
        if (method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }
        else
        {
            // $posts = $this->db->from('maxvel_post')->where('slug', $method)->limit(1)->get();
            // if($posts->num_rows() == 1)
            // {
            //     return call_user_func_array(array($this, '_'.'maxvel_post'), [$posts->row_array()]);
            // }
        }
        show_404();
    }

    private function _maxvel_post($post = array())
    {
        print_r($post);
    }
}
