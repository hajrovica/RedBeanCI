<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Things extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Students');
        $this->view_data['jscript_include'] = '<script type="text/javascript" src="' . base_url() . 'public/jquery.js"></script>' . "\r\n";

    }

    function index(){
        $this->show();

    }


    function show(){

        $this->load->view('view_things', $this->view_data);


    }

    function ajax_get_table(){

            $start_row = $this->uri->segment(3);
            $per_page = 3;

            if (trim($start_row) == '') {
               $start_row = 0;
            }

            $stu = $this->Students->get_students();
            //print_r($stu);
            $total_rows = count($stu);
            echo $total_rows;

            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'things/ajax_get_table';
            $config['total_rows'] = $total_rows;
            $config['per_page'] = $per_page;
            $config['full_tag_open'] = '<p class="pag">';
            $config['full_tag_close'] = '</p>';
            $this->pagination->initialize($config);

        $this->view_data['pagination']=$this->pagination->create_links();
        $this->view_data['student'] = $this->Students->get_students_limited($start_row,  $per_page);

          $_html = $this->load->view('view_things_table', $this->view_data,TRUE);

          echo $_html;
    }


}

