<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        cek_login();
        cek_user();
    }

    public function index(){
        $data['title'] = 'Order - Ecommerce Admin';
        $data['heading'] = 'Order';
        $data['subview'] = 'admin/order/index';
        $data['order'] = $this->ModelOrder->findAll();

        $this->load->view('admin/_layout', $data);
    }

    public function delete(){
        $id = $this->uri->segment(4);

        $this->ModelOrder->deletebyId($id);

        return redirect("admin/order");
    }

    public function export_excel(){
        $data = array(
			'title' => 'Laporan Order',
			'order' =>  $this->ModelOrder->findAll()
		);
		
		$this->load->view('admin/order/export_excel_order', $data);
    }

    public function laporan_order_pdf()
	{
		$this->load->library('Dompdf_gen');

		$data['order'] = $this->ModelOrder->findAll();

		$this->load->view('admin/order/export_pdf', $data);

		$paper = 'A4';
		$orien = 'landscape';
		$html = $this->output->get_output();
		
		$this->dompdf->set_paper($paper, $orien);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream('laporan_data_order.pdf');
	}
}