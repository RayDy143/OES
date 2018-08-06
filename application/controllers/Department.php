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
            $data['Title']="OES-Department";
            $data['useraccounts']="";
            $data['nas']="";
            $data['department']="active";
            $data['scheduler']="";
            $this->load->view('layout/header',$data);
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
        public function getDepartmentEvaluator(){
            $data['evaluator']=$this->DepartmentModel->getDepartmentEvaluator($this->input->post('ID'));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function restoreDepartment(){
			$where = array('DepartmentName' => $this->input->post('Department') );
            $query=$this->DepartmentModel->restoreDepartment($where);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
		}
        public function getDepartmentExistence(){
            $where = array('DepartmentName' => $this->input->post('Department') );
            $query=$this->DepartmentModel->checkDepartmentExistence($where);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
    }

 ?>
