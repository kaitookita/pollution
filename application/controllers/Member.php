<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
        /*$this->load->model('post_model');*/
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

	public function login_register()
	{
		/*$this->load->view('memberheader');*/
		$this->load->view('view_register');
		/*$this->load->view('footer');*/
	}

    public function reset($key)
    {

        $_SESSION['key'] = $key;
        //var_dump($key);
        $temp = "SELECT resetToken, resetComplete FROM users WHERE resetToken = '".$key."'";
        //var_dump($temp);
        $query = $this->db->query($temp);
        if ($query->num_rows() > 0)
        {
            $this->load->view('changepass');
        }
    }

    public function change_pass($key)
    {
        $data = new stdClass();

        $this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[50]|matches[password_conf]');
        $this->form_validation->set_rules('password_conf','Confirmed Password','trim|required|min_length[6]|max_length[50]');

        if($this->form_validation->run() == FALSE){

            $this->load->view('changepass', $data);
        }
        else{
            $password = $this->input->post('password');
            //$password = $this->encrypt->encode($password);
            $password = password_hash($password, PASSWORD_DEFAULT);
            //var_dump($password);

            $temp = "UPDATE users SET password = '".$password."', resetComplete = 'Yes'  WHERE resetToken = '".$key."'";
            //var_dump($temp);
            $query = $this->db->query($temp);
            //var_dump($query);
            if ($query)
            {
                $data->resetpassword = 'Change password complete';
                $this->load->view('view_register',$data);
                /*echo "Change Complete";*/
            }
            else{
                $data->resetpassword = 'Can not change password';
                $this->load->view('view_register',$data);
            }

        }
    }
}
