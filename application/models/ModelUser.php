<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    public function findAll()
    {
        try {
            $query = $this->db->get('user');
            $result = $query->result();

            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function findById($user_id)
    {
        try {
            $this->db->where('user_id', $user_id);
            $query = $this->db->get('user');
            $result = $query->result();

            // Debugging statement


            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }




    public function update($user_id, $firstname, $lastname, $email, $password)
    {
        $this->db->where('user_id', $user_id);
        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ];
        $this->db->update('user', $data);
        return true;
    }

    public function deleteUser($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('user');

        return true;
    }

    public function countUser(){
        return $this->db->count_all('user');
    }
}
