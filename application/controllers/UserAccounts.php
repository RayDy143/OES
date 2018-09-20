<?php
    /**
     *
     */
     defined('BASEPATH') OR exit('No direct script access allowed');
    class UserAccounts extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('DepartmentModel');
            $this->load->model('UserAccountModel');
            $this->load->model('UserInfoModel');
            $this->load->model('UserTypeModel');
        }
        function Import(){
            $data['Title']="OES-User Accounts";
            $data['useraccounts']="active";
            $data['nas']="";
            $data['department']="";
            $data['scheduler']="";
            $data['evaluation']="";
            $data['dep']=$this->DepartmentModel->getAllDepartment();
            $data['utype']=$this->UserTypeModel->getUserType();
            $this->load->view('layout/header',$data);
            $this->load->view('admin/import_user_page',$data);
        }
        function Add(){
            $data['Title']="OES-User Accounts";
            $data['useraccounts']="active";
            $data['nas']="";
            $data['department']="";
            $data['scheduler']="";
            $data['evaluation']="";
            $data['dep']=$this->DepartmentModel->getAllDepartment();
            $data['utype']=$this->UserTypeModel->getUserType();
            $this->load->view('layout/header',$data);
            $this->load->view('admin/add_user_page',$data);
        }
        function View(){
            $data['Title']="OES-User Accounts";
            $data['useraccounts']="active";
            $data['nas']="";
            $data['department']="";
            $data['scheduler']="";
            $data['evaluation']="";
            $data['dep']=$this->DepartmentModel->getDepartment("All");
            $data['utype']=$this->UserTypeModel->getUserType();
            $this->load->view('layout/header',$data);
            $this->load->view('admin/view_user_accounts_page',$data);
        }
        public function uploadExcel()
        {
            $config['upload_path']='./assets/uploads/Excel';
            $config['allowed_types']='xlsx|xlsm|xltx|xltm';
            $config['file_name'] = $this->input->post("Filename");
            $this->load->library('upload',$config);
            $data['success']=false;
            if($this->upload->do_upload('File')){
                $upload=$this->upload->data();
                $data['success']=true;
                $data['filename']=$upload['file_name'];
            }
            echo json_encode($data);
        }
        public function uploadTempExcel()
        {
            $config['upload_path']='./assets/temp_files';
            $config['allowed_types']='xlsx|xlsm|xltx|xltm';
            $config['file_name'] = $this->input->post("Filename");
            $this->load->library('upload',$config);
            $data['success']=false;
            if($this->upload->do_upload('File')){
                $upload=$this->upload->data();
                $data['success']=true;
                $data['filename']=$upload['file_name'];
            }
            echo json_encode($data);
        }
        public function getAllDepartment()
        {
            $data['department']=$this->DepartmentModel->getDepartment("All");
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getUserInfo(){
            $data['info']=$this->UserInfoModel->getUserInfo($this->input->post('ID'));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getUserAccountInfo(){
            $data['info']=$this->UserInfoModel->getUserAccountInfo($this->input->post('ID'));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function deleteUser(){
            $query=$this->UserAccountModel->DeleteUser($this->input->post('ID'));
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        //Restore user using email
        public function restoreUser(){
            $where = array('Email' => $this->input->post('Email') );
            $query=$this->UserAccountModel->restoreUser($where);
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
        public function importUser()
        {
            $datas = array('Email' => $this->input->post('Email'),
                            'Password'=>$this->input->post('Email'),
                            'DepartmentID' => $this->input->post('DepartmentID'),
                            'UserTypeID'=>2
                        );
            $query=$this->UserAccountModel->AddNewUser($datas);
			$data['success']=false;
			if($query){
				$data['success']=true;
			}
			echo json_encode($data);
        }
        public function AddNewUser(){
			$datas = array('Email' => $this->input->post('Email'),
                            'Password'=>$this->input->post('Email'),
                            'DepartmentID' => $this->input->post('cmbDepartment'),
                            'UserTypeID'=>$this->input->post('UserTypeID')
                        );
			$query['data']=$this->UserAccountModel->AddNewUser($datas);
			$data['success']=false;
			if($query['data']){
				$data['success']=true;
			}
			echo json_encode($data);
		}
        public function AddAsNewUser(){
            $email=$this->input->post('Email');
            $datas = array('Email' => $this->input->post('Email'),'Password'=>$this->input->post('Email'),'DepartmentID' => $this->input->post('cmbDepartment'),'UserTypeID'=>$this->input->post('UserTypeID'));
            $query=$this->UserAccountModel->AddAsNewUser($email,$datas);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function checkEmailExistence(){
            $data['user']=$this->UserAccountModel->checkEmailExistence($this->input->post('Email'));
            $data['success']=false;
            if($data['user']){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getAllUser(){
            $data['user']=$this->UserAccountModel->getAllUsers($this->input->post("RoleID"),$this->input->post("DepartmentID"));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
    }

 ?>
