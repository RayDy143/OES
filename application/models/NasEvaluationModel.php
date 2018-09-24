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
        public function getMean($userid,$nasid,$evalid)
        {
            $query=$this->db->query("Select ROUND(AVG(Rating),1) as Mean from nasevaluation where UserID='$userid' and NasID='$nasid' and EvaluationID='$evalid'");
            return $query->row();
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
