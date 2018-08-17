<?php
    /**
     *
     */
    class Nas extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model("DepartmentModel");
            $this->load->model("NASModel");
            $this->load->model("UploadedPictureModel");
            $this->load->model("NasScheduleModel");
            $this->load->model("DailyScheduleModel");
            $this->load->model("SchedulerModel");
            $this->load->model("NasUploadedPictureModel");
        }
        function index(){
            $data['Title']="OES-Nas";
            $data['useraccounts']="";
            $data['nas']="active";
            $data['department']="";
            $data['scheduler']="";
            $data['dep']=$this->DepartmentModel->getAllDepartment();
            $this->load->view('layout/header',$data);
            $this->load->view('admin/new_nas_page');
        }
        function View(){
            $data['Title']="OES-View NAS";
            $data['useraccounts']="";
            $data['nas']="active";
            $data['department']="";
            $data['scheduler']="";
            $data['dep']=$this->DepartmentModel->getAllDepartment();
            $this->load->view('layout/header',$data);
            $this->load->view('admin/nas_page');
        }
        function Import(){
            $data['Title']="OES-Import";
            $data['useraccounts']="";
            $data['nas']="active";
            $data['department']="";
            $data['scheduler']="";
            $this->load->view('layout/header',$data);
            $this->load->view('admin/import_nas_page');
        }
        function Info($id){
            $data['Title']="OES-NAS Information";
            $data['useraccounts']="";
            $data['nas']="active";
            $data['department']="";
            $data['scheduler']="";
            $data['dep']=$this->DepartmentModel->getAllDepartment();
            $data['nasprofile']=$this->NASModel->getNasProfile($id);
            $data['nasschedule']=$this->NasScheduleModel->getSpecificNasSchedule($id);
            $data['dailysched']=$this->DailyScheduleModel->getDailySchedofNAS($id);
            $this->load->view('layout/header',$data);
            $this->load->view('admin/more_nas_info_page');
        }
        function AssignSchedule($nasid){
            $data['Title']="OES-NAS Information";
            $data['useraccounts']="";
            $data['nas']="active";
            $data['department']="";
            $data['scheduler']="";
            $data['nasprofile']=$this->NASModel->getNasProfile($nasid);
            $data['sched']=$this->SchedulerModel->getSchedule();
            $this->load->view('layout/header',$data);
            $this->load->view('admin/assign_schedule_page');
        }
        public function AssignNasSchedule()
        {
            $fields = array('NasID' => $this->input->post('NasID'),'ScheduleID'=> $this->input->post('Schedule'));
            $where = array('NasID' => $this->input->post('NasID'));
            $this->NasScheduleModel->reassignSchedule($where);
            $this->NasScheduleModel->assignSchedule($fields);
            $data['Title']="OES-NAS Information";
            $data['useraccounts']="";
            $data['nas']="active";
            $data['department']="";
            $data['scheduler']="";
            $data['scheduleactive']="active";
            $data['dep']=$this->DepartmentModel->getAllDepartment();
            $data['nasprofile']=$this->NASModel->getNasProfile($this->input->post('NasID'));
            $data['nasschedule']=$this->NasScheduleModel->getSpecificNasSchedule($this->input->post('NasID'));
            $data['dailysched']=$this->DailyScheduleModel->getDailySchedofNAS($this->input->post('NasID'));
            $this->load->view('layout/header',$data);
            $this->load->view('admin/more_nas_info_page');
        }
        public function uploadExcel()
        {
            $config['upload_path']='./assets/temp_files';
            $config['allowed_types']='xlsx|xlsm|xltx|xltm';
            $this->load->library('upload',$config);
            $data['success']=false;
            if($this->upload->do_upload('ExcelFile')){
                $upload=$this->upload->data();
                $data['filename']=$upload['file_name'];
                $data['success']=true;
            }
            echo json_encode($data);
        }
        function uploadProfilePic($file){
			$config['upload_path']= './assets/uploads/Picture';
            $config['allowed_types']= 'gif|jpg|png|jpeg|JPG|JPEG';
            $this->load->library('upload',$config);
            if($this->upload->do_upload($file)){
           	    $upload = $this->upload->data();
            	$fields = array('Filename' => $upload['file_name']);
            	return $this->UploadedPictureModel->insertPicture($fields);
            }else{
            	return false;
            }
		}
        public function changePicture(){
            $data['success']=false;
            $this->NasUploadedPictureModel->updatePicture($this->input->post('NasID'));
            $picid=$this->uploadProfilePic('UploadPic');
            if($picid){
                $query=$this->NasUploadedPictureModel->insertProfile($this->input->post('NasID'),$picid);
                if($query){
                    $data['success']=true;
                }
            }
            echo json_encode($data);
        }
        public function updateNasInfo(){
            $where = array('IDNumber' => $this->input->post('IDNumber') );
            $fields = array(
                            'Firstname' => $this->input->post('Firstname'),
                            'Middlename' => $this->input->post('Middlename'),
                            'Middlename' => $this->input->post('Middlename'),
                            'Lastname' => $this->input->post('Lastname'),
                            'Email' => $this->input->post('Email'),
                            'Address' => $this->input->post('Address'),
                            'Birthdate' => $this->input->post('Birthdate'),
                            'ContactNumber' => $this->input->post('ContactNumber'),
                            'DepartmentID' => $this->input->post('Department'),
                            );
            $query=$this->NASModel->update($where,$fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getAllNas(){
            $data['nas']=$this->NASModel->getNas($this->input->post('ID'));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function deleteNas()
        {
            $where = array('NasID' => $this->input->post("ID") );
            $query=$this->NASModel->deleteNas($where);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function AddNewNas()
        {
            $data['success']=false;
            $picid=$this->uploadProfilePic('UploadPic');
            if($picid){
                $fields = array(
                                'IDNumber' => $this->input->post('IDNumber')
                                ,'Firstname' => $this->input->post('Firstname')
                                ,'Middlename' => $this->input->post('Middlename')
                                ,'Lastname' => $this->input->post('Lastname')
                                ,'Email' => $this->input->post('Email')
                                ,'Address' => $this->input->post('Address')
                                ,'Birthdate' => $this->input->post('Birthdate')
                                ,'ContactNumber' => $this->input->post('ContactNumber')
                                ,'DepartmentID' => $this->input->post('Department')
                );
                $nasid=$this->NASModel->AddNas($fields);
                $query=$this->NasUploadedPictureModel->insertProfile($nasid,$picid);
                if($query){
                    $data['success']=true;
                }
            }
            echo json_encode($data);
        }
    }

 ?>
