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
        }
        public function index()
        {
            $data['eval']=$this->EvaluationModel->getActiveEvaluation();
            $data['nas']=$this->NASModel->getNas($_SESSION['DepartmentID']);
            $this->load->view('Evaluator/header',$data);
            $this->load->view('Evaluator/home_page');
        }
        public function Evaluate()
        {
            $data['nasprofile']=$this->NASModel->getNasProfile($_SESSION['evaluatenasid']);
            $this->load->view('Evaluator/header',$data);
            $this->load->view('Evaluator/nas_evaluation_page');
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
        }
        public function insertQuestinEvaluation()
        {
            $fields = array(
                'NasID' => $this->input->post('NasID'),
                'UserID' => $_SESSION['UserID'] ,
                'QuestionID'=> $this->input->post('QuestionID'),
                'Evaluatio'
            );
        }
    }

 ?>
