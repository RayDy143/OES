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
            $this->load->model("DTRModel");
            $this->load->model("DailyScheduleModel");
            $this->load->model("NasModel");
            $this->load->model("NasAbsentModel");
            $this->load->model("WorkingDatesModel");
            $this->load->model("MonthlyImportedDTRModel");
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
                            $data['sywork']=$this->WorkingDatesModel->getSchoolyear();
                            $data['semwork']=$this->WorkingDatesModel->getSemester();
                            $data['monthwork']=$this->WorkingDatesModel->getMonth();
                            $data['month']=$this->DTRModel->getMonth();
                            $data['sy']=$this->DTRModel->getSchoolyear();
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
        public function uploadExcel()
        {
            $config['upload_path']='./assets/uploads/Excel';
            $config['allowed_types']='xlsx|xlsm|xltx|xltm';
            $config['file_name'] = $this->input->post("Filename");
            $this->load->library('upload',$config);
            $data['success']=false;
            if($this->upload->do_upload('File')){
                $upload=$this->upload->data();
                $data['success']=true;
                $data['filename']=$upload['file_name'];
            }
            echo json_encode($data);
        }
        // public function getNasAttendance()
        // {
        //     $where = array('IDNumber' => $this->input->post('IDNumber'),'Schoolyear'=>$this->input->post('Schoolyear'),'Semester'=>$this->input->post('Semester'),'Month'=>$this->input->post('Month') );
        //
        // }
        public function addDTR()
        {
            $time=$this->input->post('DateTime');
            if($this->input->post('Type')=="Time in"){
                $query=$this->DailyScheduleModel->getDailySchedByIDNumber($this->input->post('IDNumber'),$this->input->post('Day'));
                if($query){
                    $datefrom=new DateTime($this->input->post('DateTime'));
                    $from=date("Y-m-d H:i", strtotime(str_replace('2018-07-02',' ',$datefrom->format('m/d/y').' '.$query->StartTime)));
                    $value=date("Y-m-d H:i", strtotime(str_replace('2018-07-02',' ',$time)));
                    $lackingmins=round((strtotime($value) - strtotime($from)) / 60,2);
                    if($lackingmins<=35){
                        if($lackingmins<0){
                            $lackingmins=0;
                        }
                        $date = new DateTime($this->input->post('DateTime'));
                        $fields = array(
                            'Schoolyear' => $this->input->post('Schoolyear'),
                            'Semester' => $this->input->post('Semester'),
                            'Month' => $this->input->post('Month'),
                            'Date'=>$date->format('Y-m-d H:i'),
                            'Type'=>'Time in',
                            'IDNumber'=>$this->input->post('IDNumber'),
                            'NasBiometricID'=>$this->input->post('No'),
                            'MinutesLacking'=>$lackingmins,
                            'DateString'=>$date->format('Y-m-d')
                         );
                         if($this->DTRModel->checkDuplicateDate($this->input->post('IDNumber'),$date->format('Y-m-d'),'Time in')){

                         }else{
                             $insertquery=$this->DTRModel->Insert($fields);
                         }
                    }
                }
            }else{
                $query=$this->DailyScheduleModel->getDailySchedByIDNumber($this->input->post('IDNumber'),$this->input->post('Day'));
                if($query){
                    $datefrom=new DateTime($this->input->post('DateTime'));
                    $from=date("Y-m-d H:i", strtotime(str_replace('2018-07-02',' ',$datefrom->format('m/d/y').' '.$query->EndTime)));
                    $value=date("Y-m-d H:i", strtotime(str_replace('2018-07-02',' ',$time)));
                    $lackingmins=round(((strtotime($from) - strtotime($value)) / 60),2);
                    if($lackingmins<30){
                        if($lackingmins<0){
                            $lackingmins=0;
                        }
                        $date = new DateTime($this->input->post('DateTime'));
                        $fields = array(
                            'Schoolyear' => $this->input->post('Schoolyear'),
                            'Semester' => $this->input->post('Semester'),
                            'Month' => $this->input->post('Month'),
                            'Date'=>$date->format('Y-m-d H:i'),
                            'Type'=>'Time out',
                            'NasBiometricID'=>$this->input->post('No'),
                            'IDNumber'=>$this->input->post('IDNumber'),
                            'MinutesLacking'=>$lackingmins,
                            'DateString'=>$date->format('Y-m-d')
                         );
                         if($this->DTRModel->checkDuplicateDate($this->input->post('IDNumber'),$date->format('Y-m-d'),'Time out')){

                         }else{
                             $insertquery=$this->DTRModel->Insert($fields);
                         }
                    }
                }
            }
        }

        public function CheckIfMonthImportExist()
        {
            $where = array('Schoolyear' => $this->input->post('Schoolyear'),'Semester'=>$this->input->post('Semester'),'Month'=>$this->input->post('Month') );
            $query=$this->MonthlyImportedDTRModel->CheckIfExisted($where);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function checkAbsensces()
        {
            $nas=$this->NasModel->getNas('All');
            if($nas){
                foreach ($nas as $nasrow) {
                    $nasid=$nasrow['IDNumber'];
                    $where = array('Schoolyear' => $this->input->post('Schoolyear'),'Semester'=>$this->input->post('Semester'),'Month'=>$this->input->post('Month'),'IsDeleted'=>0);
                    $works=$this->WorkingDatesModel->GetBySchoolyearAndSemesterAndMonth($where);
                    if($works){
                        foreach ($works as $work) {
                            $where = array('IDNumber' => $nasid ,'DateString'=>$work['Date'] );
                            $ispresent=$this->DTRModel->checkPresent($where);
                            if($ispresent){

                            }else{
                                $nasabsentdata = array(
                                    'Date' => $work['Date'],
                                    'IDNumber' => $nasid,
                                    'Schoolyear' => $this->input->post('Schoolyear'),
                                    'Semester' => $this->input->post('Semester'),
                                    'Month' => $this->input->post('Month')
                                 );
                                 $this->NasAbsentModel->Insert($nasabsentdata);
                            }
                        }
                    }
                }
            }
            $monthlydata = array('Schoolyear' => $this->input->post('Schoolyear'),'Semester'=>$this->input->post('Semester'),'Month'=>$this->input->post('Month') );
            $this->MonthlyImportedDTRModel->Insert($monthlydata);
        }
        public function getDTR()
        {
            $where = array('Schoolyear' => $this->input->post('Schoolyear'),'Semester'=>$this->input->post('Semester'),'Month'=>$this->input->post('Month') );
            $data['dtr']=$this->DTRModel->Get($where);
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
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
