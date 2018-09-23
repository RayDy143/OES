<?php
    /**
     *
     */
    class Evaluation extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('EvaluationModel');
            $this->load->model('CategoryModel');
            $this->load->model('QuestionModel');
            $this->load->model('SchoolyearModel');
        }
        public function Question()
        {
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){
                            $data['Title']="OES-Evaluation Question";
                            $data['useraccounts']="";
                            $data['nas']="";
                            $data['eval']="";
                            $data['scheduler']="";
                            $data['department']="";
                            $data['evaluation']="active";
                            $data['category']=$this->CategoryModel->getCategory();
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/eval_question_page');
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
        public function QuestionCategory()
        {
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){
                            $data['Title']="OES-Question Category";
                            $data['useraccounts']="";
                            $data['nas']="";
                            $data['eval']="";
                            $data['scheduler']="";
                            $data['department']="";
                            $data['evaluation']="active";
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/question_category_page');
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
        public function ImportQuestion()
        {
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){
                            $data['Title']="OES-Import Category";
                            $data['useraccounts']="";
                            $data['nas']="";
                            $data['eval']="";
                            $data['scheduler']="";
                            $data['department']="";
                            $data['evaluation']="active";
                            $data['category']=$this->CategoryModel->getCategory();
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/import_evaluation_question_page');
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
        public function Manage()
        {
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){
                            $data['Title']="OES-Manage Evaluation";
                            $data['useraccounts']="";
                            $data['nas']="";
                            $data['eval']="";
                            $data['scheduler']="";
                            $data['department']="";
                            $data['evaluation']="active";
                            $data['sy']=$this->SchoolyearModel->getSchoolyear();
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/manage_evaluation_page');
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
        public function Monitor($id)
        {
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){
                            $data['Title']="OES-Manage Evaluation";
                            $data['useraccounts']="";
                            $data['nas']="";
                            $data['eval']="";
                            $data['scheduler']="";
                            $data['department']="";
                            $data['evaluation']="active";
                            $data['eval']=$this->EvaluationModel->getEvaluationByID($id);
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/monitor_evaluation_page');
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
        public function getEvaluation()
        {
            $data['eval']=$this->EvaluationModel->Get();
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function addEvaluation()
        {
            $fields = array('Schoolyear' => $this->input->post('dtpAddEvalYear1')."-".$this->input->post('txtAddEvalYear'),'Semester'=>$this->input->post('cmbAddEvalSemester'),'StartingDate'=>$this->input->post('dtpStartingDate') );
            $query=$this->EvaluationModel->Add($fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function changeStatus()
        {
            $where = array('EvaluationID' => $this->input->post('ID'));
            if($this->input->post('Status')=='Deactivated'){
                $fields = array('IsActive' => 1 );
                $query=$this->EvaluationModel->changeStatus($where,$fields);
                $data['success']=false;
                if($query){
                    $data['success']=true;
                }
                echo json_encode($data);
            }else{
                $fields = array('IsActive' => 0 );
                $query=$this->EvaluationModel->changeStatus($where,$fields);
                $data['success']=false;
                if($query){
                    $data['success']=true;
                }
                echo json_encode($data);
            }
        }
        public function deleteEvaluation()
        {
            $where = array('EvaluationID' =>$this->input->post('ID') );
            $query=$this->EvaluationModel->Delete($where);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getQuestion()
        {
            $data['question']=$this->QuestionModel->getQuestion($this->input->post('ID'));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function addSchoolyear()
        {
            $date = DateTime::createFromFormat("Y-m-d", $this->input->post('dtpYear'));
            $year=$date->format("Y");
            $newyear=(int)$year+1;
            $field = array('Year' => ($year."-".$newyear));
            $query=$this->SchoolyearModel->addSchoolyear($field);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getSchoolyear()
        {
            $data['sy']=$this->SchoolyearModel->getSchoolyear();
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function deleteSchoolyear()
        {
            $where = array('SchoolyearID' => $this->input->post('ID') );
            $query=$this->SchoolyearModel->deleteSchoolyear($where);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function uploadTempExcel()
        {
            $config['upload_path']='./assets/temp_files';
            $config['allowed_types']='xlsx|xlsm|xltx|xltm';
            $config['file_name'] = $this->input->post("Filename");
            $this->load->library('upload',$config);
            $data['success']=false;
            if($this->upload->do_upload('txtFile')){
                $upload=$this->upload->data();
                $data['success']=true;
                $data['filename']=$upload['file_name'];
            }
            echo json_encode($data);
        }
        public function uploadExcel()
        {
            $config['upload_path']='./assets/uploads/Excel';
            $config['allowed_types']='xlsx|xlsm|xltx|xltm';
            $config['file_name'] = $this->input->post("Filename");
            $this->load->library('upload',$config);
            $data['success']=false;
            if($this->upload->do_upload('txtFile')){
                $upload=$this->upload->data();
                $data['success']=true;
                $data['filename']=$upload['file_name'];
            }
            echo json_encode($data);
        }
        public function importQuestions()
        {
            $fields = array('Question' =>$this->input->post('Question'),'CategoryID'=>$this->input->post('CategoryID') );
            $query=$this->QuestionModel->Add($fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function deleteQuestion()
        {
            $where = array('QuestionID' => $this->input->post('ID'));
            $query=$this->QuestionModel->Delete($where);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function updateQuestion()
        {
            $where = array('QuestionID' => $this->input->post('txtEditQuestionID') );
            $fields = array('Question' => $this->input->post('txtEditQuestion'),'CategoryID'=>$this->input->post('cmbEditQuestionCategory') );
            $query=$this->QuestionModel->Update($where,$fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function addQuestion()
        {
            $fields = array('Question' => $this->input->post('txtAddQuestion'),'CategoryID' => $this->input->post('cmbAddCategory') );
            $query=$this->QuestionModel->Add($fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getCategory()
        {
            $data['success']=false;
            $data['category']=$this->CategoryModel->getCategory();
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function updateCategory()
        {
            $where = array('CategoryID' => $this->input->post('txtEditCatID') );
            $fields = array('Category' => $this->input->post('txtEditCat') );
            $data['success']=false;
            $query=$this->CategoryModel->Update($where,$fields);
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function addCategory()
        {
            $fields = array('Category' => $this->input->post('txtAddCategory'));
            $query=$this->CategoryModel->Add($fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function deleteCategory()
        {
            $where = array('CategoryID' => $this->input->post('ID') );
            $query=$this->CategoryModel->Delete($where);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
    }

 ?>
