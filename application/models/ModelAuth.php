<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAuth extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password)
    {
        $query = $this->db->get_where('user', array('email' => $email));

        if ($query->num_rows() > 0) { // menghitung row 
            $data_user = $query->row();
            if (password_verify($password, $data_user->password)) {
                $data = [
                    'user_id' => $data_user->user_id,
                    'email' => $data_user->email,
                    'firstname' => $data_user->firstname,
                    'lastname' => $data_user->lastname,
                    'loggedin' => TRUE,
                    'role_id' => $data_user->role_id, 
                ];
                $this->session->set_userdata($data);

                return True;
            }
        } else {
            return false;
        }
    }

    public function register($firstname, $lastname, $email, $password)
    {
        $existingUser = $this->db->get_where('user', array('email' => $email))->row();
        if ($existingUser) {
            return false; 
        }
    
        // Create new user
        $data_user = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'role_id' => 2,
            'password' => password_hash($password, PASSWORD_BCRYPT),
        );
        $this->db->insert('user', $data_user);
    
        return true;
    }
    
}
