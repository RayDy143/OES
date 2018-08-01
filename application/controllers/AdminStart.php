<?php
    /**
     *
     */
    class AdminStart extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
        }
        function index(){
            $this->load->view('admin/admin_start_page');
        }
    }

 ?>
