<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSlider extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        try {
            $sql = "SELECT *FROM slider";
            $query = $this->db->query($sql);
            $result = $query->result();

            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function createSlider($nama, $image)
    {
        try {
            $data = [
                'nama' => $nama,
                'image' => $image,
            ];
            $this->db->insert('slider', $data);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function findById($id)
    {
        try {
            $sql = "SELECT * FROM slider WHERE slider_id = ?";
            $query = $this->db->query($sql, [$id]);
            $result = $query->result();

            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function updateSlider($id, $nama, $image)
    {
        $data = [
            'nama' => $nama,
            'image' => $image,
        ];

        $this->db->where('slider_id', $id);
        $this->db->update('slider', $data);
        return true;
    }


   

    public function deleteById($id)
    {
        try {
            $this->db->where('slider_id', $id);
            $this->db->delete('slider');
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    


    public function getImage($slider_id)
    {
        $this->db->select('image');
        $this->db->from('slider');
        $this->db->where('slider_id', $slider_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->image;
        } else {
            return null;
        }
    }
}
