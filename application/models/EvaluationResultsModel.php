<?php
    /**
     *
     */
    class EvaluationResultsModel extends CI_Model
    {
        public function getEvaluationLogs($id)
        {
            $query=$this->db->query("SELECT userinfo.Firstname as userFname, userinfo.Lastname as userLname, nas.Firstname as nasFname, nas.Lastname as nasLname, Date, Mean, nas.NasID, useraccount.UserID, EvaluationID from evaluationresults inner join nas on evaluationresults.NasID=nas.NasID inner join useraccount on evaluationresults.UserID=useraccount.UserID inner join userinfo on useraccount.UserID=userinfo.UserID where EvaluationID='$id'");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function Insert($fields)
        {
            $this->db->insert('evaluationresults',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function getNasEvaluationCategoryResult($nasid,$userid,$evalid)
        {
            $query=$this->db->query("SELECT DISTINCT(category.Category) as Category FROM nasevaluation inner join question on nasevaluation.QuestionID=question.QuestionID inner join category on question.CategoryID=category.CategoryID where nasevaluation.NasID='$nasid' and nasevaluation.UserID='$userid' and nasevaluation.EvaluationID='$evalid'");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function getNasEvaluationQuestionResultByCategory($nasid,$userid,$evalid,$cat)
        {
            $query=$this->db->query("SELECT * from nasevaluation inner join question on nasevaluation.QuestionID=question.QuestionID inner join category on question.CategoryID=category.CategoryID where nasevaluation.NasID='$nasid' and nasevaluation.UserID='$userid' and nasevaluation.EvaluationID='$evalid' and category.Category='$cat'");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function getNasEvaluation($nasid,$sy,$sem)
        {
            $query=$this->db->query("SELECT AVG(Mean) as Mean from evaluationresults inner join evaluation on evaluationresults.EvaluationID=evaluation.EvaluationID where evaluationresults.NasID='$nasid' and evaluation.Schoolyear='$sy' and evaluation.Semester='$sem'");
            if($query->num_rows()>0){
                return $query->row();
            }else{
                return false;
            }
        }
    }

 ?>
