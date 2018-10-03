<?php
    /**
     *
     */
    class NasEvaluationModel extends CI_Model
    {
        public function Insert($fields)
        {
            $this->db->insert('nasevaluation',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function getMean($userid,$nasid,$evalid,$catid)
        {
            $query=$this->db->query("Select Rating as Mean from nasevaluation inner join question on nasevaluation.QuestionID=question.QuestionID inner join category on question.CategoryID=category.CategoryID where UserID='$userid' and NasID='$nasid' and EvaluationID='$evalid' and category.CategoryID='$catid'");
            return $query->result_array();
        }
        public function hasEvaluatedNas($where)
        {
            $this->db->where($where);
            $query=$this->db->get('nasevaluation');
            if($query->num_rows()>0){
                return true;
            }else{
                return false;
            }
        }
    }

?>
