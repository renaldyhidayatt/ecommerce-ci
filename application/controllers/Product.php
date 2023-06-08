<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function detail($slug)
    {
        $product = $this->ModelProduct->findBySlug($slug);

        if ($product) {
            $data['slug'] = $slug;
            $data['subview'] = 'product/index';
            $data['product'] = $product;
            $this->load->view('_layout', $data);
        } else {

            $data['subview'] = 'category/notfound';
            $this->load->view('_layout', $data);
        }
    }

    public function updateQuantity()
    {
        $cart = $this->input->post('cart'); // Mendapatkan data cart dari input

        try {
            if (!empty($cart)) {
                $cartData = json_decode($cart, true); // Mengubah string JSON menjadi array asosiatif

                foreach ($cartData as $item) {
                    $product_id = $item['product_id'];
                    $quantity = $item['quantity'];

                    // Mendapatkan informasi produk dari database
                    $product = $this->ModelProduct->findById($product_id);
                    $currentStock = $product[0]->countInStock;

                    // Mengurangi stok berdasarkan jumlah produk di cart
                    $newStock = $currentStock - $quantity;

                    // Memperbarui nilai countInStock di database
                    $result = $this->ModelProduct->updateQuantity($product_id, $newStock);

                    if ($result == true) {
                        $response = "Product quantity updated: " . $quantity . " for product ID: " . $product_id;
                    } else {
                        $response = "Error updating quantity for product ID: " . $product_id;
                    }

                    echo json_encode($response); // Mengirimkan respon sebagai JSON
                }
            } else {
                echo "No cart data received";
            }
        } catch (Exception $e) {
            $response = $e->getMessage();
            echo json_encode($response); // Mengirimkan respon sebagai JSON
        }
    }
}
