<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelOrder extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        try {
            $sql = "SELECT *FROM orders";
            $query = $this->db->query($sql);
            $result = $query->result();

            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function createOrder($order_id, $email, $postal_code, $country_code, $total_product, $total_price, $user_id)
    {
        try {
            $orderData = array(
                'order_id' => $order_id,
                'email' => $email,
                'postal_code' => $postal_code,
                'country_code' => $country_code,
                'total_price' => $total_price,
                'total_product' => $total_product,
                'user_id' => $user_id
            );

            $this->db->insert('orders', $orderData);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function pendapatanPerbulan()
    {
        // Mendapatkan data pendapatan per bulan dari tabel orders
        $query = $this->db->query("SELECT MONTH(created_at) AS bulan, SUM(total_price) AS total_pendapatan FROM orders GROUP BY MONTH(created_at)");

        $data_bulan = array();
        $data_pendapatan = array();

        foreach ($query->result() as $row) {
            $data_bulan[] = $row->bulan;
            $data_pendapatan[] = $row->total_pendapatan;
        }

        $data = array(
            'data_bulan' => $data_bulan,
            'data_pendapatan' => $data_pendapatan
        );

        return $data;
    }

    public function findByUserId($userId)
    {
        $this->db->where('user_id', $userId);
        $query = $this->db->get('orders');
        return $query->result();
    }

    public function sumTotalPendapatan(){
        $result = $this->db->query("select sum(total_price) as total_pendapatan from orders ")->result();
        return $result[0]->total_pendapatan;
    }
    
    public function countOrder(){
        return $this->db->count_all('orders');
    }
}
