<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelCategory extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        try {
            $sql = "SELECT *FROM category";
            $query = $this->db->query($sql);
            $result = $query->result();

            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function createCategory($nama, $image, $slug)
    {
        try {
            $data = [
                'nama_kategori' => $nama,
                'image_category' => $image,
                'slug_category' => $slug,
            ];
            $this->db->insert('category', $data);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function findById($id)
    {
        try {
            $sql = "SELECT * FROM category WHERE category_id = ?";
            $query = $this->db->query($sql, [$id]);
            $result = $query->result();

            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();

            return null;
        }
    }

    public function updateCategory($id, $nama, $image, $slug)
    {
        $data = [
            'nama_kategori' => $nama,
            'image_category' => $image,
            'slug_category' => $slug
        ];

        $this->db->where('category_id', $id);
        $this->db->update('category', $data);
        return true;
    }


    public function findByNameCategory($name)
    {
        try {
            $sql = "SELECT * FROM category WHERE name = ?";
            $query = $this->db->query($sql, [$name]);
            $result = $query->result();

            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function deleteById($id)
    {
        try {
            $this->db->where('category_id', $id);
            $this->db->delete('category');
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function findBySlug($slug)
    {
        try {
            $this->db->select('category.*, product.*');
            $this->db->from('category');
            $this->db->join('product', 'category.category_id = product.category_id');
            $this->db->where('category.slug_category', $slug);
            $query = $this->db->get();
            $result = $query->result();

            if ($result) {
                return $result;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }


    public function getImage($category_id)
    {
        $this->db->select('image_category');
        $this->db->from('category');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->image_category;
        } else {
            return null;
        }
    }
}
