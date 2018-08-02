<?php
    /**
     *
     */
    class AdminStart extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('UserInfoModel');
        }
        function index(){
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/FirstTimeLogin'));
					}else{
						$sess['data']=$this->UserInfoModel->getUserInfo($_SESSION['UserID']);
						$this->session->set_userdata($sess['data'][0]);
						$this->load->view("Admin/admin_start_page");
					}
				}else{
					header('location:'.base_url('index.php/Login'));
				}
			}else{
				header('location:'.base_url('index.php/Login'));
			}
        }
    }

 ?>
