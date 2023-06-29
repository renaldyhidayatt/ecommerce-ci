<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelCart extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        try {
            $sql = "SELECT *FROM cart";
            $query = $this->db->query($sql);
            $result = $query->result();

            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function findByUserId($userId)
    {
        $this->db->where('user_id', $userId);
        $query = $this->db->get('cart');
        return $query->result();
    }



    public function findByEmailCartRow($email)
    {
        try {
            $this->db->select('c.*');
            $this->db->from('cart c');
            $this->db->join('user u', 'u.user_id = c.user_id');
            $this->db->where('u.email', $email);
            $query = $this->db->get();
            return $query->num_rows();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function createCart($nama, $price, $image, $quantity, $user_id, $email, $product_id)
    {
        try {
            $data = [
                'name' => $nama,
                'price' => $price,
                'image' => $image,
                'quantity' => $quantity,
                'user_id' => $user_id,
                'email' => $email,
                'product_id' => $product_id
            ];

            $this->db->insert('cart', $data);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function deleteAll($email)
    {
        try {
            $sql = "DELETE FROM cart WHERE email = ?";
            $this->db->query($sql, array($email));
    
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    
    


    public function deleteCart($id)
    {
        try {
            $this->db->where('cart_id', $id);
            $this->db->delete('cart');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
