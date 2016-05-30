<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shared extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('post_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function data()
    {
        /*$this->load->view('home');*/
        $this->load->view('shareddata');
        /*$this->load->view('footer');*/
    }
    public function sharedata()
    {
        $user_id = $_SESSION['user_id'];
        $data = array(
            'lat'   => $this->input->post('lat'),
            'lng'      => $this->input->post('lng'),
            'vision'      => $this->input->post('vision'),
            'smell'      => $this->input->post('smell'),
            'user_id'      => $user_id

        );
        $this->post_model->insert_sharedata($data);
        redirect('/');
        /*var_dump($data);*/
    }
}
