<?php
    /**
     *
     */
    class Attendance extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model("WorkingDatesModel");
        }
        public function WorkingDate()
        {
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){

                            $data['Title']="OES-Working Dates";
                            $data['useraccounts']="";
                            $data['nas']="";
                            $data['evaluation']="";
                            $data['department']="";
                            $data['scheduler']="";
                            $data['attendance']="active";
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/working_dates_page');
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
        public function getWorkingDates()
        {
            $data['workingdates']=$this->WorkingDatesModel->Get();
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function addWorkingDays()
        {
            // $where = array('Date' =>  );
        }
    }

 ?>
