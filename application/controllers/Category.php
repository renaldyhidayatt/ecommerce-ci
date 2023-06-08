<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Category extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function detail($slug){

        $category = $this->ModelCategory->findBySlug($slug);

        if ($category) {
            $data['slug'] = $slug;
            $data['subview'] = 'category/index';
            $data['category'] = $category;
            $this->load->view('_layout', $data);
        }else{
            $data['subview'] = 'category/notfound';
            $this->load->view('_layout', $data);
        }
    }
}