<?php
    /**
     *
     */
    class RenewRemarks extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('DTRModel');
            $this->load->model('NasGradesModel');
            $this->load->model('NasAbsentModel');
            $this->load->model('EvaluationResultsModel');
        }

        public function index()
        {
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){
                            $data['Title']="OES-Renewal Remarks";
                            $data['useraccounts']="";
                            $data['nas']="";
                            $data['eval']="";
                            $data['scheduler']="";
                            $data['department']="";
                            $data['evaluation']="";
                            $data['renewremarksnav']="active";
                            $data['sy']=$this->DTRModel->getSchoolyear();
                            $data['month']=$this->DTRModel->getMonth();
                            $data['allowancenav']="";
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/renewal_remarks_page');
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
        public function getLowest()
        {
            $data['lowestgrade']=$this->NasGradesModel->getLowest($this->input->post('IDNumber'),$this->input->post('Schoolyear'),$this->input->post('Semester'));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getEvaluation()
        {
            $data['evaluationmean']=$this->EvaluationResultsModel->getNasEvaluation($this->input->post('IDNumber'),$this->input->post('Schoolyear'),$this->input->post('Semester'));
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
                'Semester' => $this->input->post('Semester')
            );
            $data['absents']=$this->NasAbsentModel->getNasAbsences($where);
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
    }

 ?>
