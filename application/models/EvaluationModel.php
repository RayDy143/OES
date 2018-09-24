<?php
    /**
     *
     */
    class EvaluationModel extends CI_Model
    {
        public function Get()
        {
            $where = array("IsDeleted"=>0);
            $this->db->where($where);
            $query=$this->db->get('evaluation');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function getActiveEvaluation()
        {
            $where = array('IsActive' => 1,'DateEnded'=>null );
            $this->db->where($where);
            $query=$this->db->get('evaluation');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function Add($fields)
        {
            $this->db->insert('evaluation',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function Delete($where)
        {
            $fields = array('IsDeleted' => 1 );
            $this->db->where($where);
            $this->db->update('evaluation',$fields);
            if($this->db->affected_rows()){
                return true;
            }else{
                return false;
            }
        }
        public function getEvaluationByID($id)
        {
            $where = array('EvaluationID' => $id );
            $this->db->where($where);
            $query=$this->db->get('evaluation');
            if($query->num_rows()>0){
                return $query->row();
            }else{
                return false;
            }
        }
        public function changeStatus($where,$fields)
        {
            $this->db->where($where);
            $this->db->update('evaluation',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function checkUndoneEvaluation()
        {
            $where = array("HasEnded"=>0,"IsDeleted"=>0);
            $this->db->where($where);
            $query=$this->db->get('evaluation');
            if($query->num_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function endEvaluation($where)
        {
            $this->db->where($where);
            $fields = array('DateEnded' => date('Y-m-d'),'IsActive'=>0,'HasEnded'=>1);
            $this->db->update('evaluation', $fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function getCurrentEvaluationID()
        {
            $where = array('IsDeleted' => 0,'IsActive'=>1,'HasEnded'=>0);
            $this->db->where($where);
            $query=$this->db->get('evaluation');
            if($query->num_rows()>0){
                return $query->row();
            }else{
                return false;
            }
        }
    }

 ?>
