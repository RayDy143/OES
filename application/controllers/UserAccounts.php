<?php
    /**
     *
     */
    class UserAccounts extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('DepartmentModel');
            $this->load->model('UserAccountModel');
        }
        function index(){
            $data['dep']=$this->DepartmentModel->getAllDepartment();
            $data['user']=$this->UserAccountModel->getAllUsers();
            $this->load->view('layout/header');
            $this->load->view('admin/user_accounts_page',$data);
        }
        public function AddNewUser(){
			$datas = array('Email' => $this->input->post('Email'),'Password'=>$this->input->post('Email'),'DepartmentID' => $this->input->post('cmbDepartment'),'UserTypeID'=>$this->input->post('UserTypeID'));
			$query['data']=$this->UserAccountModel->AddNewUser($datas);
			$data['success']=false;
			if($query['data']){
				$data['success']=true;
			}
			echo json_encode($data);
		}
        public function deleteUser(){
            
        }
    }

 ?>
