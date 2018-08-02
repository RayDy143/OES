<?php
    /**
     *
     */
    class UserInfo extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('UserInfoModel');
        }
        function index($id){
            $data['info']=$this->UserInfoModel->getUserInfo($id);
            $this->load->view('layout/header');
            $this->load->view('admin/user_info_page',$data);
        }
    }

 ?>
