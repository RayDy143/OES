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
            $this->load->view('layout/header');
            $this->load->view('admin/user_accounts_page',$data);
        }
        public function deleteUser(){
            $query=$this->UserAccountModel->DeleteUser($this->input->post('ID'));
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getUserByType(){
            $data['user']=$this->UserAccountModel->getUserByType($this->input->post("ID"));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getUserByDepartment(){
            $data['user']=$this->UserAccountModel->getUserByDepartment($this->input->post("ID"));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getUserByTypeAndDepartment(){
            $data['user']=$this->UserAccountModel->getUserByTypeAndDepartment($this->input->post("TypeID"),$this->input->post("DepID"));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
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
        public function getAllUser(){
            $data['user']=$this->UserAccountModel->getAllUsers();
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
    }

 ?>
