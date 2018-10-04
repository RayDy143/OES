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
            $this->load->model("NasGradesModel");
            $this->load->model("NasAbsentModel");
            $this->load->model("DTRModel");
        }
        function Add(){
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){
                            $data['Title']="OES-Nas";
                            $data['useraccounts']="";
                            $data['nas']="active";
                            $data['department']="";
                            $data['scheduler']="";
                            $data['evaluation']="";
                            $data['dep']=$this->DepartmentModel->getAllDepartment();
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/new_nas_page');
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
        function View(){
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){
                            $data['Title']="OES-View NAS";
                            $data['useraccounts']="";
                            $data['nas']="active";
                            $data['department']="";
                            $data['scheduler']="";
                            $data['evaluation']="";
                            $data['dep']=$this->DepartmentModel->getDepartment("All");
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/nas_page');
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
        function Import(){
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){
                            $data['Title']="OES-Import";
                            $data['useraccounts']="";
                            $data['nas']="active";
                            $data['department']="";
                            $data['evaluation']="";
                            $data['scheduler']="";
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/import_nas_page');
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
        function Info($id,$tab=NULL){
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){
                            $data['Title']="OES-NAS Information";
                            $data['useraccounts']="";
                            $data['nas']="active";
                            $data['department']="";
                            $data['evaluation']="";
                            $data['scheduler']="";
                            $data['sy']=$this->DTRModel->getSchoolyear();
                            $data['month']=$this->DTRModel->getMonth();
                            $data['dep']=$this->DepartmentModel->getDepartment("All");
                            $data['nasprofile']=$this->NASModel->getNasProfile($id);
                            $data['nasschedule']=$this->NasScheduleModel->getSpecificNasSchedule($id);
                            $data['dailysched']=$this->DailyScheduleModel->getDailySchedofNAS($id);
                            $data['sched']=$this->SchedulerModel->getSchedule("All");
                            $data['gradeschoolyear']=$this->NasGradesModel->getSchoolyear($id);
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/more_nas_info_page');
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
            if($tab=="Schedule"){
                $data['scheduleactive']="active";
            }

        }
        public function assignSchedule()
        {
            $where = array('NasID' => $this->input->post('NasID') );
            $fields = array('NasID' => $this->input->post('NasID'),'ScheduleID'=> $this->input->post('cmbSchedule') );
            $this->NasScheduleModel->reassignSchedule($where);
            $query=$this->NasScheduleModel->assignSchedule($fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getAllDepartment()
        {
            $data['dep']=$this->DepartmentModel->getDepartment('All');
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getNasAttendance()
        {
            $where = array(
                'IDNumber' => $this->input->post('IDNumber'),
                'Schoolyear' => $this->input->post('Schoolyear'),
                'Semester' => $this->input->post('Semester'),
                'Month' => $this->input->post('Month')
             );
            $data['nasattendance']=$this->DTRModel->getNasAttendance($where);
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getNasLate()
        {
            $data['late']=$this->DTRModel->getNumberOfLates($this->input->post('IDNumber'),$this->input->post('Schoolyear'),$this->input->post('Semester'),$this->input->post('Month'));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getNasUndertime()
        {
            $data['undertime']=$this->DTRModel->getUndertimeMinutes($this->input->post('IDNumber'),$this->input->post('Schoolyear'),$this->input->post('Semester'),$this->input->post('Month'));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getNasAbsents()
        {
            $where = array(
                'IDNUmber' => $this->input->post('IDNumber'),
                'Schoolyear' => $this->input->post('Schoolyear'),
                'Semester' => $this->input->post('Semester'),
                'Month' => $this->input->post('Month'),
            );
            $data['absents']=$this->NasAbsentModel->getNasAbsences($where);
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
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
        public function ImportNas()
        {
            $fields = array
            (
                'IDNumber' => $this->input->post('IDNumber'),
                'Firstname' => $this->input->post('Firstname'),
                'Middlename' => $this->input->post('Middlename'),
                'Lastname' => $this->input->post('Lastname'),
                'Email' => $this->input->post('Email'),
                'Address' => $this->input->post('Address'),
                'JobDescription' => $this->input->post('JobDescription'),
                'TuitionFee' => $this->input->post('TuitionFee'),
                'ContactNumber' => $this->input->post('ContactNumber'),
                'Birthdate' => $this->input->post('Birthdate'),
                'DepartmentID' => $this->input->post('DepartmentID')
            );
            $nasid=$this->NASModel->Import($fields);
            $data['success']=false;
            if($nasid){
                $data['success']=true;
                $this->NasUploadedPictureModel->insertProfile($nasid,77);
            }
            echo json_encode($data);
        }
        public function importNasGrade()
        {
            $fields = array(
                'Subject' => $this->input->post('Subject'),
                'Grade' => $this->input->post('Grade'),
                'Schoolyear' => $this->input->post('Schoolyear'),
                'Semester' => $this->input->post('Semester'),
                'NasID' => $this->input->post('NasID')
            );
            $query=$this->NasGradesModel->importGrade($fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getNasGrade()
        {
            $data['nasgrades']=$this->NasGradesModel->getGrade($this->input->post('SY'),$this->input->post('sem'),$this->input->post('id'));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function deleteGrade()
        {
            $where = array('NasGradesID' => $this->input->post('ID') );
            $query=$this->NasGradesModel->deleteGrade($where);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function updateGrade()
        {
            $where = array(
                'NasGradesID' => $this->input->post('txtUpdateGradeID')
            );
            $fields = array('Subject' => $this->input->post('txtUpdateGradeSubject'),'Grade' => $this->input->post('txtUpdateGrade') );
            $query=$this->NasGradesModel->updateGrade($where,$fields);
            $data['success']=false;
            if($query){
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
                            'JobDescription' => $this->input->post('JobDescription'),
                            'TuitionFee' => $this->input->post('TuitionFee'),
                            'Birthdate' => $this->input->post('Birthdate'),
                            'ContactNumber' => $this->input->post('ContactNumber'),
                            'DepartmentID' => $this->input->post('Department'),
                            'Status' => $this->input->post('cmbStatus'),
                            );
            $nasid=$this->NASModel->update($where,$fields);
            $data['success']=false;
            if($nasid){
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
        public function restoreNas()
        {
            $where = array('IDNumber' =>$this->input->post('IDNumber') );
            $restore=$this->NASModel->restoreNas($where);
            $data['success']=false;
            if($restore){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function AddAsNew()
        {
            $data['success']=false;
            $where = array('NasID' => $this->input->post('NasID') );
            if($this->NASModel->hardDeleteNas($where))
            {
                $picid=$this->uploadProfilePic('UploadPic');
                if($picid){
                    $fields = array(
                                    'IDNumber' => $this->input->post('IDNumber')
                                    ,'Firstname' => $this->input->post('Firstname')
                                    ,'Middlename' => $this->input->post('Middlename')
                                    ,'Lastname' => $this->input->post('Lastname')
                                    ,'Email' => $this->input->post('Email')
                                    ,'JobDescription' => $this->input->post('JobDescription')
                                    ,'TuitionFee' => $this->input->post('TuitionFee')
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
            }
            echo json_encode($data);
        }
        public function AddNewNas()
        {
            $data['success']=false;
            $data['duplicateid']=false;
            $data['duplicateemail']=false;
            $data['isrecentlydeleted']=false;
            $whereDeleted = array('IDNumber' => $this->input->post('IDNumber'),'IsDeleted'=>1 );
            if($this->NASModel->IsRecentlyDeleted($whereDeleted)){
                $data['isrecentlydeleted']=$this->NASModel->IsRecentlyDeleted($whereDeleted);
            }else{
                $whereId = array('IDNumber' => $this->input->post('IDNumber'));
                if($this->NASModel->IsIDNumberExist($whereId)){
                    $data['duplicateid']=true;
                }else{
                    $whereEmail = array('Email' => $this->input->post('Email'));
                    if($this->NASModel->IsEmailExist($whereEmail)){
                        $data['duplicateemail']=true;
                    }else{
                        $picid=$this->uploadProfilePic('UploadPic');
                        if($picid){
                            $fields = array(
                                            'IDNumber' => $this->input->post('IDNumber')
                                            ,'Firstname' => $this->input->post('Firstname')
                                            ,'Middlename' => $this->input->post('Middlename')
                                            ,'Lastname' => $this->input->post('Lastname')
                                            ,'Email' => $this->input->post('Email')
                                            ,'Address' => $this->input->post('Address')
                                            ,'JobDescription' => $this->input->post('JobDescription')
                                            ,'TuitionFee' => $this->input->post('TuitionFee')
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
                    }
                }
            }
            echo json_encode($data);
        }
    }

 ?>
