<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model{

    /*	function __construct(){
            parent::__construct();
        }*/

    private $email_code; // has value set within set_session method
    public function insert_user($firstname,$lastname, $email, $password)
    {
        $sql = "INSERT INTO users (firstname, lastname, email, password)
		VALUES (" . $this->db->escape($firstname) .",
				" . $this->db->escape($lastname) .",
				'" . $email ."',
				'" . $password ."'
			)";
        $result = $this->db->query($sql);

        if($this->db->affected_rows() === 1)
        {
            $this->set_session($firstname, $lastname, $email);
            $this->send_validateion_email();
            $data_user = array('firstname' => $firstname,'email' => $email);
            return $firstname;
        }else{
            // Notify the admin by email the user registration isn't working
            // This should never occur because of the validation we did in the controller
            $this->load->library('email');
            $this->email->from('affection_fondness@hotmail.com', 'Phuwanart Forum Admin');
            $this->email->to('$email');
            $this->email->subject('Problem inserting user into database');

            if(isset($email)){
                $this->email->message('Unable to register and insert user with the email of ' .$email .' to the database.');
            }
            else{
                $this->email->message('Unable to register ande insert user tot the database');
            }
            $this->email->send();
            return false;
        }

        /*$data = array(
            'firstname'   => $firstname,
            'lastname'	  => $lastname,
            'email'       => $email,
            'password'    => $password
        );
        return $this->db->insert('users', $data);*/



    }

    public function validate_email($email_address,$email_code){
        $sql = "SELECT email, reg_time, firstname FROM users WHERE email ='{$email_address}' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();

        if($result->num_rows() === 1 && $row->firstname){
            if (md5((string)$row->reg_time) === $email_code)
                $result = $this->activate_account($email_address);
            if($result === true){
                return true;
            }
            else{
                // this should never happen
                echo 'There was an error when activating your account. Please contact the admin at ' .$this->config->item('admin_email');
                return false;
            }
        }else{
            // this should never happen
            echo 'There was an error validating your email. Please contact the admin at ' .$this->config->item('admin_email');
        }
    }

    private function set_session($firstname, $lastname, $email){
        $sql = "SELECT user_id,reg_time FROM users WHERE email =  '" .$email ."' LIMIT 1 ";
        $result = $this->db->query($sql);
        $row = $result->row();

        $sess_data = array(
            'user_id'  => $row->user_id,
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'email'	   => $email,
            'logged_in' => 0
        );
        $this->email_code = md5((string)$row->reg_time);
        $this->session->set_userdata($sess_data);
    }

    private function send_validateion_email(){
        $this->load->library('email');
        $email = $this->session->userdata('email');
        $email_code = $this->email_code;

        $this->email->set_mailtype('html');
        $this->email->from($this->config->item('bot_email'), 'Air4Pollution Forum');
        $this->email->to($email);
        $this->email->subject('Please activate your account at Air4Pollution Forum');

        $message ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
				   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html>
				   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				   </head><body>';
        $message .= '<p>Dear ' .$this->session->userdata('firstname') . ',</p>';
        //the link we send will look like /register/validate_email/john@doe.com/d27c56da48bdf9b1cc36c7749409bbda   <a href="'. base_url().'register/validate_email/' .$email .'/'.$email_code.'">
        $message .= '<p>Thank for registering on 4SharedPollution Please <strong><a href="'. base_url().'register/validate_email/' .$email .'/'.$email_code.'"> Click here</a></strong> to activate your account. After you have activated your account, you will be able to log into 4SharedPollution and start doing shared pollution </p>';
        $message .='<p>Thank you!</p>';
        $message .='<p>The Team at 4SharedPollution</p>';
        $message .='</body></html>';

        $this->email->message($message);
        $this->email->send();
    }

    private function activate_account($email_address)
    {
        $sql = "UPDATE users SET activated = 1 WHERE email = '" . $email_address ."' LIMIT 1 ";
        $this->db->query($sql);
        if($this->db->affected_rows() === 1){
            return true;
        }else{
            // this should never happen
            echo 'Error whin activating your account in the database, please contact' .$this->config->item('admin_email');
            return false;
        }
    }

    private function change_password($key)
    {

    }


}