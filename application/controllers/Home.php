<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Home extends CI_Controller
{
    public function index()
    {
        $data['subview'] = 'index';
        $data['category'] = $this->ModelCategory->findAll();
        $data['product'] = $this->ModelProduct->findAll();
        $data['slider'] = $this->ModelSlider->findAll();
       

        $this->load->view('_layout', $data);
    }
}
