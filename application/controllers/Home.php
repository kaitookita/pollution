<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->model('post_model');

    }

    public function index()
    {
        $getdata = $this->post_model->get_data();
        $getposition = $this->post_model->get_position();
        $this->load->view('home');
        $this->load->view('content',array('data' => $getdata,'position' => $getposition));
    }
}
