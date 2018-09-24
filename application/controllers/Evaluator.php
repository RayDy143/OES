<?php
    /**
     *
     */
    class Evaluator extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('EvaluationModel');
            $this->load->model('NASModel');
            $this->load->model('CategoryModel');
            $this->load->model('QuestionModel');
            $this->load->model('NasEvaluationModel');
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
                            header('location:'.base_url('index.php/AdminStart'));
                        }else{
                            $data['eval']=$this->EvaluationModel->getActiveEvaluation();
                            $data['nas']=$this->NASModel->getNas($_SESSION['DepartmentID']);
                            $this->load->view('Evaluator/header',$data);
                            $this->load->view('Evaluator/home_page');
                        }
					}
				}else{
					header('location:'.base_url('index.php/Login'));
				}
			}else{
				header('location:'.base_url('index.php/Login'));
			}
        }
        public function Evaluate()
        {
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        $data['nasprofile']=$this->NASModel->getNasProfile($_SESSION['evaluatenasid']);
                        $data['evaluationid']=$_SESSION['evaluationid'];
                        $this->load->view('Evaluator/header',$data);
                        $this->load->view('Evaluator/nas_evaluation_page');
					}
				}else{
					header('location:'.base_url('index.php/Login'));
				}
			}else{
				header('location:'.base_url('index.php/Login'));
			}

        }
        public function getCategory()
        {
            $data['cat']=$this->CategoryModel->getCategory();
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getQuestionByCategory()
        {
            $data['question']=$this->QuestionModel->getQuestion($this->input->post('ID'));
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function evaluateNas()
        {
            $_SESSION['evaluatenasid']=$this->input->post('ID');
            $eval=$this->EvaluationModel->getCurrentEvaluationID();
            $_SESSION['evaluationid']=$eval->EvaluationID;
        }
        public function insertQuestionEvaluation()
        {
            $fields = array(
                'NasID' => $this->input->post('NasID'),
                'UserID' => $_SESSION['UserID'] ,
                'QuestionID'=> $this->input->post('QuestionID'),
                'EvaluationID'=>$_SESSION['evaluationid'],
                'Rating'=>$this->input->post('Rating')
            );
            $this->NasEvaluationModel->Insert($fields);
        }
        public function addEvaluationResult()
        {
            $getMean=$this->NasEvaluationModel->getMean($_SESSION['UserID'],$this->input->post('NasID'),$_SESSION['evaluationid']);
            $mean=$getMean->Mean;
            $fields = array('UserID' => $_SESSION['UserID'],'Mean'=>$mean,'NasID'=>$this->input->post('NasID'),'EvaluationID'=> $_SESSION['evaluationid']);
            $query=$this->EvaluationResultsModel->Insert($fields);
            $data['success']=false;
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getActiveEvaluation()
        {
            $data['activeeval']=$this->EvaluationModel->getActiveEvaluation();
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function getNas()
        {
            $data['nas']=$this->NASModel->getNas($_SESSION['DepartmentID']);
            $data['success']=false;
            if($data){
                $data['success']=true;
            }
            echo json_encode($data);
        }
        public function hasEvaluatedNas()
        {
            $where = array('UserID' => $_SESSION['UserID'],'NasID'=>$this->input->post('NasID'),'EvaluationID'=>$this->input->post('EvalID') );
            $data['success']=false;
            $query=$this->NasEvaluationModel->hasEvaluatedNas($where);
            if($query){
                $data['success']=true;
            }
            echo json_encode($data);
        }
    }

 ?>
