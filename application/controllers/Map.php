<?php if ( ! defined('BASEPATH')) exit('No direct scriot access allowed');

class Map extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('post_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function usgraph($id)
    {
        $data = $this->post_model->get_data_by_id($id);
        // var_dump($data);
        $lat1 = $data['lat']-0.00475;
        $lat2 = $data['lat']+0.00475;
        $lng1 = $data['lng']-0.00475;
        $lng2 = $data['lng']+0.00475;
        //var_dump($temp1,$temp2);

        $data2['avg'] = $this->post_model->get_average($lat1,$lat2,$lng1,$lng2);
        //var_dump(data2['avg']);
        //$this->load->view('header');
        $this->load->view('stat',$data2);
        //$this->load->view('footer');
    }

    public function stgraph($id)
    {
        $data = $this->post_model->get_station_by_id($id);
        //var_dump($data);
        $this->load->view('usgraph',array('data' => $data));
        //$this->load->view('test');
    }


}