<?php
    /**
     *
     */
    class Department extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('DepartmentModel');
        }
        function index(){
            $this->load->view('layout/header');
            $this->load->view('admin/department_page');
        }
        public function AddDepartment(){
            $fields = array('DepartmentName' => $this->input->post('Department'));
            $query=$this->DepartmentModel->AddDepartment($fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
		}
        public function getAllDepartment(){
			$data['dep']=$this->DepartmentModel->getDepartment();
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
		}
        public function deleteDepartment(){
            $query=$this->DepartmentModel->DeleteDepartment($this->input->post('ID'));
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function renameDepartment(){
            $where = array('DepartmentID' => $this->input->post('ID') );
            $fields = array('DepartmentName' => $this->input->post("Department") );
            $query=$this->DepartmentModel->renameDepartment($where,$fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
    }

 ?>
