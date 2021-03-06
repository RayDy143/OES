<?php
    /**
     *
     */
    class Scheduler extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('SchedulerModel');
            $this->load->model('DailyScheduleModel');
            $this->load->model('NasScheduleModel');
            $this->load->model('DepartmentModel');
            $this->load->model('ShiftModel');
            $this->load->model('ShiftModel');
            $this->load->model('DayModel');
        }
        function index(){
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){
                            $data['Title']="OES-Scheduler";
                            $data['useraccounts']="";
                            $data['nas']="";
                            $data['department']="";
                            $data['evaluation']="";
                            $data['nas']="";
                            $data['shift']=$this->ShiftModel->getShift();
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/scheduler_page');
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
        function Add(){
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){
                            $data['Title']="OES-Scheduler/Add schedule";
                            $data['useraccounts']="";
                            $data['nas']="";
                            $data['department']="";
                            $data['evaluation']="";
                            $data['nas']="";
                            $data['shift']=$this->ShiftModel->getShift();
                            $data['day']=$this->DayModel->getDay();
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/add_schedule_page');
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
                            $data['Title']="OES-Scheduler/Add schedule";
                            $data['useraccounts']="";
                            $data['nas']="";
                            $data['evaluation']="";
                            $data['department']="";
                            $data['nas']="";
                            $data['schedule']=$this->SchedulerModel->getSchedulebyID($id);
                            $data['shift']=$this->ShiftModel->getShift();
                            $data['day']=$this->DayModel->getDay();
                            $data['dep']=$this->DepartmentModel->getDepartment("All");
                            $data['nasschedule']=$this->NasScheduleModel->getNasSchedule($id);
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/manage_schedule_page');
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
        public function editScheduleDetail()
        {
            $where = array('ScheduleID' => $this->input->post('ScheduleID') );
            $fields = array('ScheduleDescription'=>$this->input->post('txtSchedDes'),'ShiftID'=>$this->input->post('ShiftID') );
            $query=$this->SchedulerModel->updateScheduleDetails($where,$fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function deleteDailySchedule()
        {
            $where = array('DailyScheduleID' => $this->input->post('ID') );
            $query=$this->DailyScheduleModel->delete($where);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function deleteSchedule()
        {
            $where = array('ScheduleID' => $this->input->post('ID'));
            $data['success']=false;
            $data['deleteerror']=false;
            if($this->NasScheduleModel->getNasSchedule($this->input->post('ID'))){
                $data['deleteerror']=true;
            }else{
                $query=$this->SchedulerModel->delete($where);
                if($query){
                    $data['success']=true;
                }
            }

            echo json_encode($data);
        }
        public function addSchedule()
        {
            $fields = array('ScheduleDescription' => $this->input->post('txtAddSchedDescription'),'ShiftID' => $this->input->post('cmbAddSchedShift') );
            $data['id']=$this->SchedulerModel->addSchedule($fields);
            $data['success']=false;
            if($data['id']){
                $data['success']=true;
                $dayid = array(1,2,3,4,5,6);
                if($this->input->post('cmbAddSchedShift')==1){
                    $start = date("H:i", strtotime(str_replace(' ', '',"07:05 AM")));
                    $end = date("H:i", strtotime(str_replace(' ', '',"12:05 AM")));
                    foreach ($dayid as $id) {
                        $dailyschedfields = array('DayID' => $id,
                                        'StartTime' => $start,
                                        'EndTime' => $end,
                                        'ScheduleID' => $data['id']
                                     );
                        $query=$this->DailyScheduleModel->addDailySched($dailyschedfields);
                    }
                }else{
                    $start = date("H:i", strtotime(str_replace(' ', '',"1:05 PM")));
                    $end = date("H:i", strtotime(str_replace(' ', '',"6:45 PM")));
                    foreach ($dayid as $id) {
                        $dailyschedfields = array('DayID' => $id,
                                        'StartTime' => $start,
                                        'EndTime' => $end,
                                        'ScheduleID' => $data['id']
                                     );
                        $query=$this->DailyScheduleModel->addDailySched($dailyschedfields);
                    }
                }
            }
            echo json_encode($data);
        }
        public function getNasScheduleNumber(){
            $data['nasschedule']=$this->NasScheduleModel->getNasSchedule($this->input->post('ID'));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getSchedule(){
            $data['sched']=$this->SchedulerModel->getSchedule($this->input->post("ID"));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function updateDailySched()
        {
            $end = date("H:i", strtotime(str_replace(' ', '', $this->input->post("End"))));
            $start = date("H:i", strtotime(str_replace(' ', '', $this->input->post("Start"))));
            $where = array('DailyScheduleID' => $this->input->post('ID'));
            $fields = array('StartTime'=>$start
                           ,'EndTime'=>$end
                            );
            $query=$this->DailyScheduleModel->update($where,$fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);

        }
        public function addDailySched()
        {
            $end = date("H:i", strtotime(str_replace(' ', '', $this->input->post("EndTime"))));
            $start = date("H:i", strtotime(str_replace(' ', '', $this->input->post("StartTime"))));
            $fields = array('DayID' => $this->input->post('Day'),
                            'StartTime' => $start,
                            'EndTime' => $end,
                            'ScheduleID' => $this->input->post('ScheduleID')
                         );
             $data['duplicate']=false;
             $data['success']=false;
            if($this->DialySchedExisted($this->input->post('Day'),$this->input->post('ScheduleID'))){
                $data['duplicate']=true;
            }else{
                $query=$this->DailyScheduleModel->addDailySched($fields);
                if($query){
                    $data['success']=true;
                }
            }
            echo json_encode($data);
        }
        public function DialySchedExisted($day,$schedid){
            $query=$this->DailyScheduleModel->checkDuplicate($day,$schedid);
            if($query){
                return true;
            }else{
                return false;
            }
        }
        public function getDailySched()
        {
            $data['dailysched']=$this->DailyScheduleModel->getDailySched($this->input->post('ScheduleID'));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
    }

 ?>
