<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        cek_login();
        cek_user();
    }

    public function index()
    {
        $chartOrder = $this->ModelOrder->pendapatanPerbulan();

        $totalUser = $this->ModelUser->countUser();
        $totalProduct = $this->ModelProduct->countProduct();

        $totalPendapatan = $this->ModelOrder->sumTotalPendapatan();
        $totalOrders = $this->ModelOrder->countOrder();

        $namaBulan = array(
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'May',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Aug',
            9 => 'Sep',
            10 => 'Oct',
            11 => 'Nov',
            12 => 'Dec'
        );

        $data_bulan = array(); // Inisialisasi array untuk menyimpan nama bulan

        // Mengubah angka bulan menjadi nama bulan
        foreach ($chartOrder['data_bulan'] as $bulan) {
            $data_bulan[] = $namaBulan[$bulan];
        }




        $data['title'] = 'Dashboard Page - Ecommerce Admin';
        $data['heading'] = 'Dashboard';
        $data['subview'] = 'admin/index';
        $data['totalUser'] = $totalUser;
        $data['data_bulan'] = $data_bulan;
        $data['totalPendapatan'] = $totalPendapatan;
        $data['totalProduct'] = $totalProduct;
        $data['totalOrders'] = $totalOrders;
        $data['data_pendapatan'] = $chartOrder['data_pendapatan'];

        $this->load->view('admin/_layout', $data);
    }
}
