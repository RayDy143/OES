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
                            $data['excludedate']=$this->WorkingDatesModel->Get();
                            $data['schoolyear']=$this->WorkingDatesModel->getSchoolyear();
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
        public function DTR()
        {
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){

                            $data['Title']="OES-DTR";
                            $data['useraccounts']="";
                            $data['nas']="";
                            $data['evaluation']="";
                            $data['department']="";
                            $data['scheduler']="";
                            $data['attendance']="active";
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/daily_time_record_page');
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
            $where = array('Schoolyear' => $this->input->post('SY'),'IsDeleted'=>0,'Semester'=>$this->input->post('Semester') );
            $data['workingdates']=$this->WorkingDatesModel->GetBySchoolyearAndSemester($where);
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function addWorkingDays()
        {
            $date = new DateTime($this->input->post('Date'));
            $where = array('Date' => $date->format('Y-m-d'),'IsDeleted'=>0);
            $fields = array(
                'Day' => $this->input->post('Day'),
                'Month'=> $this->input->post('Month'),
                'Date'=>$date->format('Y-m-d'),
                'Schoolyear'=> $this->input->post('Schoolyear'),
                'Semester'=> $this->input->post('Semester'),
            );
            $query=$this->WorkingDatesModel->Insert($where,$fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function removeWorkingDates()
        {
            $where = array('WorkingDateID' => $this->input->post('ID') );
            $query=$this->WorkingDatesModel->Delete($where);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
    }

 ?>
