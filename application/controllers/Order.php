<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['subview'] = 'order/index';
        $data['order'] = $this->ModelOrder->findByUserId($this->session->userdata('user_id'));


        $this->load->view('_layout', $data);
    }

    public function create()
    {
        $orderID = $this->input->post('order_id');
        $email = $this->session->userdata('email');
        $postalCode = $this->input->post('postal_code');
        $countryCode = $this->input->post('country_code');
        $totalProduct = $this->input->post('total_product');
        $totalPrice = $this->input->post('total_price');
        $user_id = $this->session->userdata('user_id');

        if ($this->ModelOrder->createOrder($orderID, $email, $postalCode, $countryCode, $totalProduct, $totalPrice, $user_id) == true) {
            $orderData = array(
                'order_id' => $orderID,
                'email' => $email,
                'postal_code' => $postalCode,
                'country_code' => $countryCode,
                'total_product' => $totalProduct,
                'total_price' => $totalPrice
            );
            $this->ModelCart->deleteAll($this->session->userdata('email'));

            $response = array(
                'status' => 'success',
                'message' => 'Order created successfully',
                'mydat' => $orderData
            );

            $this->output->set_content_type('application/json')->set_output(json_encode($response));
        } else {
            $response = array(
                'status' => 'failed',
                'message' => 'Order creation failed'
            );

            $this->output->set_content_type('application/json')->set_output(json_encode($response));
        }
    }

    public function generatePdf(){
        $user_id = $this->session->userdata('user_id');
        $data['order'] = $this->ModelOrder->findByUserId($user_id);

        $this->load->library('dompdf_gen');
        
        $this->load->view('order/pdf', $data);
        $paper_size = 'A4'; // ukuran kertas
		$orientation = 'landscape'; //tipe format kertas potrait atau landscape
		$html = $this->output->get_output();

		$this->dompdf->set_paper($paper_size, $orientation);
		//Convert to PDF
		$this->dompdf->load_html($html); 
		$this->dompdf->render();
		$this->dompdf->stream("bukti-order-$user_id.pdf", array('Attachment' => 0));

    }

    public function delete(){
        $id = $this->uri->segment(3);

        $this->ModelOrder->deletebyId($id);

        return redirect("order");
    }

}
