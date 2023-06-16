<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelProduct extends CI_Model
{
    public function createProduct($nama, $image, $category_id, $description, $price, $countInStock, $slug)
    {
        try {
            $data = [
                'name' => $nama,
                'image_product' => $image,
                'category_id' => $category_id,
                'description' => $description,
                'price' => $price,
                'countInStock' => $countInStock,
                'slug_product' => $slug
            ];

            $this->db->insert('product', $data);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();

            return null;
        }
    }

    public function findByName($name){
        try {
            $sql = "SELECT * FROM product WHERE name = ?";
            $query = $this->db->query($sql, [$name]);
            $result = $query->result();

            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
            
            return null;
        }
    }

    public function findById($id)
    {
        try {
            $sql = "SELECT * FROM product WHERE product_id = ?";
            $query = $this->db->query($sql, [$id]);
            $result = $query->result();

            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();

            return null;
        }
    }

    public function findByIdProduct($id)
    {
        try {
            $sql = "SELECT * FROM product WHERE product_id = ?";
            $query = $this->db->query($sql, [$id]);
            $result = $query->row();

            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    // public function findById($id)
    // {
    //     return $this->db->get_where('product', ['product_id' => $id])->row();
    // }

    public function findAll()
    {
        return $this->db->get('product')->result();
    }

    public function update($id, $data){
        
        $this->db->where('product_id', $id);
        $this->db->update('product', $data);

        return true;
    }

    // public function update($id, $nama, $image, $category_id, $description, $price, $countInStock, $slug)
    // {
    //     $data = [
    //         'name' => $nama,
    //         'image_product' => $image,
    //         'category_id' => $category_id,
    //         'description' => $description,
    //         'price' => $price,
    //         'countInStock' => $countInStock,
    //         'slug_product' => $slug
    //     ];

    //     $this->db->where('product_id', $id);
    //     $this->db->update('product', $data);

    //     // Echoing the parameters
    //     // echo "ID: " . $id . "<br>";
    //     // echo "Nama: " . $nama . "<br>";
    //     // echo "Image: " . $image . "<br>";
    //     // echo "Category ID: " . $category_id . "<br>";
    //     // echo "Description: " . $description . "<br>";
    //     // echo "Price: " . $price . "<br>";
    //     // echo "Count In Stock: " . $countInStock . "<br>";


    //     return true;
    // }

    public function findBySlug($slug)
    {
        try {
            $sql = "SELECT * FROM product WHERE slug_product = ?";
            $query = $this->db->query($sql, [$slug]);
            $result = $query->result();

            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function delete($id)
    {
        $this->db->where('product_id', $id);
        $this->db->delete('product');

        return true;
    }

    public function getImage($product_id)
    {
        $this->db->select('image_product');
        $this->db->from('product');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->image_product;
        } else {
            return null;
        }
    }

    public function countProduct()
    {
        return $this->db->count_all('product');
    }

    public function updateQuantity($product_id, $quantity)
    {
        try {
            $data = array(
                'countInStock' => $quantity
            );
            $this->db->where('product_id', $product_id);
            $this->db->update('product', $data);

            return true;
        } catch (Exception $e) {
            throw new Exception('Error updating product quantity: ' . $e->getMessage());
        }
    }
}
