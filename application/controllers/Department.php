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
            $this->load->model('LocationModel');
        }
        function index(){
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){

                            $data['Title']="OES-Department";
                            $data['useraccounts']="";
                            $data['nas']="";
                            $data['evaluation']="";
                            $data['department']="active";
                            $data['scheduler']="";
                            $data['location']=$this->LocationModel->getAllLocation();
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/department_page');
                        }else{
        					header('location:'.base_url('index.php/Evaluator'));
                        }
					}
				}else{
					header('location:'.base_url('index.php/Login'));
				}
			}else{
				header('location:'.base_url('index.php/Login'));
			}
        }
        function Manage($id){
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){
                            $data['Title']="OES-Department";
                            $data['useraccounts']="";
                            $data['nas']="";
                            $data['department']="active";
                            $data['scheduler']="";
                            $data['evaluation']="";
                            $data['location']=$this->LocationModel->getAllLocation();
                            $data['depid']=$id;
                            $data['depevaluator']=$this->DepartmentModel->getDepartmentEvaluator($id);
                            $data['depnas']=$this->DepartmentModel->getDepartmentNas($id);
                            $data['depinfo']=$this->DepartmentModel->getSpecificDepartment($id);
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/manage_department_page');
                        }else{
        					header('location:'.base_url('index.php/Evaluator'));
                        }
					}
				}else{
					header('location:'.base_url('index.php/Login'));
				}
			}else{
				header('location:'.base_url('index.php/Login'));
			}
        }
        public function AddDepartment(){
            $fields = array('DepartmentName' => $this->input->post('DepartmentName'),'LocationID'=>$this->input->post('Location'));
            $query=$this->DepartmentModel->AddDepartment($fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
		}
        public function EditDepartmentInfo()
        {
            $data['success']=false;
            $wheredepartment = array('DepartmentID' => $this->input->post('txtEditDepartmentID'));
            $departmentfields = array('DepartmentName' => $this->input->post('txtEditDepName'),'LocationID'=>$this->input->post('cmbLocation'));
            $query=$this->DepartmentModel->UpdateDepartmentInfo($wheredepartment,$departmentfields);
            if($this->input->post('cmbDepartmentHead')){
                $this->DepartmentModel->AddDepartmentHead($this->input->post('cmbDepartmentHead'),$wheredepartment,$this->input->post('txtEditDepartmentID'));
            }
            $data['success']=true;
            echo json_encode($data);
        }
        public function getAllDepartment(){
			$data['dep']=$this->DepartmentModel->getDepartment($this->input->post("ID"));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
		}
        public function deleteDepartment(){
            $data['success']=false;
            $data['isUsed']=false;
            if($this->DepartmentModel->isDepartmentUsed($this->input->post('ID'))){
                $data['isUsed']=true;
            }else{
                $query=$this->DepartmentModel->DeleteDepartment($this->input->post('ID'));
                if($query){
                    $data['success']=true;
                }
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
        public function getDepartmentNas(){
            $data['nas']=$this->DepartmentModel->getDepartmentNas($this->input->post('ID'));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function isDepartmentUsed(){
            $query=$this->DepartmentModel->isDepartmentUsed();
            $data['success']=false;
            if($query){
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
