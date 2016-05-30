<?php if ( ! defined('BASEPATH')) exit('No direct scriot access allowed');

class Login extends CI_Controller{

     public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('post_model');
        $this->load->model('model_login');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    /**
     * login function.
     *
     * @access public
     * @return void
     */
    public function login_user(){
        $data = new stdClass();

        // the following login mistakes we can know without even querying the database, lets do it
        $this->form_validation->set_rules('email','Email Address','trim|required|min_length[6]|max_length[50]|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[50]');

        if($this->form_validation->run() === FALSE){
            // user didn't validate, send back to login form and show errors
            /*$this->load->view('header');*/
            $this->load->view('view_register', $data);
        }else{

            $email = $this->input->post('email');
            $user_id = $this->model_login->get_user_id_from_email($email);
            $user    = $this->model_login->get_user($user_id);

            // set session user datas
            if($user_id!=FALSE) {
                $_SESSION['user_id'] = (int)$user->user_id;
            }
            if(!is_null($user))
            {$_SESSION['username']     = (string)$user->firstname;}
            $_SESSION['loggedin']    = (bool)false;

            // initial checks on data are ok, now check if they are valid credentials or not
            $result = $this->model_login->login_user();

            switch($result){
                case 'logged_in' :
                    $_SESSION['loggedin']    = (bool)true;
                    // authentication complete, send to logged in homepage
                    $this->load->view('user/login/login_success');
                    break;
                case 'incorrect_password' :
                    $data->error = 'password is incorrect';
                    /*$this->load->view('header');*/
                    $this->load->view('view_register',$data);
                    break;
                case 'not_activated' :
                    $data->error = 'email not activated';
                    /*$this->load->view('header');*/
                    $this->load->view('view_register',$data);
                    break;
                case 'email_not_found' :
                    $data->error = 'email not found please register';
                    /*$this->load->view('header');*/
                    $this->load->view('view_register',$data);
                    break;
            }
        }
    }

   public function logedin()
   {
       /*$this->load->view('header');*/
       $this->load->view('user/login/logedin');
       /*$this->load->view('footer');*/
   }


    // reset password
    public function reset_password(){
        $this->load->view('view_reset_password');
    }

    public function forgot_password(){

        $success = new stdClass();

        $this->form_validation->set_rules('email','Email Address','trim|required|min_length[6]|max_length[50]|valid_email');
        if($this->form_validation->run() === FALSE){

            $this->load->view('view_reset_password', $success);
        }else{
            $success->success = 'go to your email and click Reset password';
            $email = $this->input->post('email');
            $this->model_login->send_mail_token($email);
            $this->load->view('view_register',$success);


        }


        //$this->load->view('view_reset_password');
    }



    // Logout
    /**
     * logout function.
     *
     * @access public
     * @return void
     */
    public function logout() {

        // create the data object
        $data = new stdClass();

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {

            // remove session datas
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }

            // user logout ok
            /*$this->load->view('header');*/
            /*$this->load->view('head');*/
            $this->load->view('user/logout/logout_success', $data);
            /*$this->load->view('footer');*/

        } else {

            // there user was not logged in, we cannot logged him out,
            // redirect him to site root
            redirect('/');

        }

    }



    public function test()
    {

        $this->load->view('testhash');

    }

}