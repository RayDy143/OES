<?php
    /**
     *
     */
    class MonthlyAllowance extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('DTRModel');
            $this->load->model('NasModel');
            $this->load->model('WorkingDatesModel');
        }
        public function index()
        {
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){
                            $data['Title']="OES-Monthly Allowance";
                            $data['useraccounts']="";
                            $data['nas']="";
                            $data['eval']="";
                            $data['scheduler']="";
                            $data['department']="";
                            $data['evaluation']="";
                            $data['sy']=$this->DTRModel->getSchoolyear();
                            $data['month']=$this->DTRModel->getMonth();
                            $data['allowancenav']="active";
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/monthly_allowance_report');
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
        public function getNas()
        {
            $data['nas']=$this->NasModel->getNas('All');
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getTotalMonthDays()
        {
            $where = array(
                'Schoolyear' => $this->input->post('Schoolyear'),
                'Semester' => $this->input->post('Semester'),
                'Month' => $this->input->post('Month'),
                'IsDeleted'=>0
            );
            $data['totalmonthdays']=$this->WorkingDatesModel->GetBySchoolyearAndSemesterAndMonth($where);
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
    }

 ?>
