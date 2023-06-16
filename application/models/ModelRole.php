<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelRole extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function findAll()
    {
        try {
            $sql = "SELECT *FROM role";
            $query = $this->db->query($sql);
            $result = $query->result();

            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function createRole($nama)
    {
        try {
            $data = [
                'role' => $nama,
            ];
            $this->db->insert('role', $data);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function findById($id)
    {
        try {
            $sql = "SELECT * FROM role WHERE role_id = ?";
            $query = $this->db->query($sql, [$id]);
            $result = $query->result();

            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();

            return null;
        }
    }

    public function updateRole($id, $nama)
    {
        $data = [
            'role' => $nama,
        ];

        $this->db->where('role_id', $id);
        $this->db->update('role', $data);
        return true;
        
    }


    

    public function deleteById($id)
    {
        try {
            $this->db->where('role_id', $id);
            $this->db->delete('role');
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
