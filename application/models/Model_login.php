<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model{
    public function login_user(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        //$password = password_hash($password, PASSWORD_BCRYPT);


        $sql = "SELECT user_id,firstname, lastname,email,password,activated FROM users WHERE email = '{$email}' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();


        if($result->num_rows() === 1){
            if($row->activated){
                $temppass = $row->password;
                //$temppass = $this->encrypt->decode($temppass);
                
                if(password_verify($password, $temppass)){
                    // authenticated, now update the user's session
                    $session_data = array(
                        'user_id'    => $row->user_id,
                        'firstname'  => $row->firstname,
                        'lastname'   => $row->lastname,
                        'email'      => $row->email,
                        'loggedin'   => (bool) true
                    );
                    $this->set_session($session_data);
                    return 'logged_in';
                }else{
                    return 'incorrect_password';
                }
            }else{
                // the user hasn't activate their account
                return 'not_activated';
            }
        }else{
            // email address not found in database
            return 'email_not_found';
        }
    }

    private function set_session($session_data){
        $session_data = array(
            'user_id'     => $session_data['user_id'],
            'firstname'   => $session_data['firstname'],
            'lastname'    => $session_data['lastname'],
            'email'       => $session_data['email'],
            'logged_in'   => 1
        );

        $this->session->set_userdata($session_data);
    }

    public function get_user_id_from_email($email) {

        $this->db->select('user_id');
        $this->db->from('users');
        $this->db->where('email', $email);
        $temp = $this->db->get();
        if ($temp->num_rows() > 0)
        {
            $row = $temp->row();
            $id = $row->user_id;
            return $id;
            /*$data = array(
                'user_id'  => $row->user_id,
            );
            return $data;*/
        }
        return FALSE;

    }

    public function get_user($user_id) {
        if($user_id!=FALSE) {
            $this->db->from('users');
            $this->db->where('user_id', $user_id);
            return $this->db->get()->row();
        }
        return null;

    }

    public function send_mail_token($email) {

        //create the activasion code
        $token = md5(uniqid(rand(),true));
        //var_dump($token);

        $temp = "UPDATE users SET resetToken = '".$token."', resetComplete='No' WHERE email = '".$email."'";
        //var_dump($temp);
        $query = $this->db->query($temp);
        //var_dump($query);
        if ($query)
        {
            $this->load->library('email');

            $this->email->set_mailtype('html');
            $this->email->from($this->config->item('bot_email'), 'Air4Pollution Forum');
            $this->email->to($email);
            $this->email->subject('Reset Password');

            $message ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
				   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html>
				   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				   </head><body>';
            $message .= '<p>Someone requested that the password be reset.</p>
			<p>If this was a mistake, just ignore this email and nothing will happen.</p>
			<p>To reset your password, visit the following address: <a href="'. base_url().'member/reset/' .$token .'">Reset Password</a></p>';
            $message .='<p>Thank you!</p>';
            $message .='<p>The Team at 4SharedPollution</p>';
            $message .='</body></html>';

            $this->email->message($message);
            $this->email->send();
        }
        else{

        }



        /*$this->db->select('user_id');
        $this->db->from('users');
        $this->db->where('email', $email);
        $temp = $this->db->get();
        if ($temp->num_rows() > 0)
        {
            $row = $temp->row();
            $id = $row->user_id;
            return $id;
            $data = array(
                'user_id'  => $row->user_id,
            );
            return $data;
        }
        return FALSE;*/

    }

}
