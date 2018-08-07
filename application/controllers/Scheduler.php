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
        }
        function index(){
            $data['Title']="OES-Scheduler";
            $data['useraccounts']="";
            $data['nas']="";
            $data['department']="";
            $data['scheduler']="active";
            $this->load->view('layout/header',$data);
            $this->load->view('admin/scheduler_page');
        }
        function Add(){
            $data['Title']="OES-Scheduler/Add schedule";
            $data['useraccounts']="";
            $data['nas']="";
            $data['department']="";
            $data['scheduler']="active";
            $this->load->view('layout/header',$data);
            $this->load->view('admin/add_schedule_page');
        }
        function Manage($id){
            $data['Title']="OES-Scheduler/Add schedule";
            $data['useraccounts']="";
            $data['nas']="";
            $data['department']="";
            $data['scheduler']="active";
            $whereSched = array('ScheduleID' => $id );
            $data['schedule']=$this->SchedulerModel->getSchedulebyID($whereSched);
            $data['nasschedule']=$this->NasScheduleModel->getNasSchedule($id);
            $this->load->view('layout/header',$data);
            $this->load->view('admin/manage_schedule_page');
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
            $fields = array('ScheduleDescription' => $this->input->post('Schedule'),'Shift' => $this->input->post('Shift') );
            $data['id']=$this->SchedulerModel->addSchedule($fields);
            $data['success']=false;
            if($data){
                $data['success']=true;
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
            $data['sched']=$this->SchedulerModel->getSchedule();
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
            $fields = array('Day' => $this->input->post('Day'),
                            'StartTime' => $start,
                            'EndTime' => $end,
                            'ScheduleID' => $this->input->post('ScheduleID')
                         );
             $where = array('Day' => $this->input->post('Day'),
                            'ScheduleID'=>$this->input->post('ScheduleID')
                             );
             $data['duplicate']=false;
             $data['success']=false;
            if($this->DialySchedExisted($where)){
                $data['duplicate']=true;
            }else{
                $query=$this->DailyScheduleModel->addDailySched($fields);

                if($query){
                    $data['success']=true;
                }
            }
            echo json_encode($data);
        }
        public function DialySchedExisted($where){
            $query=$this->DailyScheduleModel->checkDuplicate($where);
            if($query){
                return true;
            }else{
                return false;
            }
        }
        public function getDailySched()
        {
            $where = array('ScheduleID' => $this->input->post('ScheduleID') );
            $data['dailysched']=$this->DailyScheduleModel->getDailySched($where);
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
    }

 ?>
