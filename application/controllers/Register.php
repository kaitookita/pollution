<?php if ( ! defined('BASEPATH')) exit('No direct scriot access allowed');

class Register extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('model_user');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        /*$this->load->view('header');*/
        $this->load->view('view_register');

    }

    public function register_user() {

        //rules to become a member
        $this->form_validation->set_rules('firstname','First Name','trim|required|min_length[3]|max_length[14]');
        $this->form_validation->set_rules('lastname','Last Name','trim|required|min_length[3]|max_length[14]');
        $this->form_validation->set_rules('email','Email Address','trim|required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[50]|matches[password_conf]');
        $this->form_validation->set_rules('password_conf','Confirmed Password','trim|required|min_length[6]|max_length[50]');

        if($this->form_validation->run() == FALSE){
            // user didn't validate, send back to login form and show errors
            /*$this->load->view('header');*/
            $this->load->view('view_register');
        }
        else{
            // successful registration
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email    = $this->input->post('email');
            $pass = $this->input->post('password');
            //$password = $this->encrypt->encode($pass);
            $password = password_hash($pass, PASSWORD_DEFAULT);
            if($this->model_user->insert_user($firstname,$lastname,$email,$password)){

                /*$this->load->view('header');*/
                $this->load->view('view_reg_success',array('firstname' => $firstname,'email' => $email));
            }
            else{
                // this should never occure
                echo 'Sorry, there\'s a problem with ther website. Contact affection_fondness@hotmail.com and let them know.';



            }

        }

    }


    public function validate_email($email_address, $email_code){
        $email_code = trim($email_code);

        $validated = $this->model_user->validate_email($email_address, $email_code);

        if($validated === true){
            /*$this->load->view('header');*/
            $this->load->view('user/login/logedin', array('email_address' => $email_address));

        }else{
            // this should never happen
            echo 'Error giving email activated confirmation, please contact' .$this->config->item('admin_email');
        }
    }




}