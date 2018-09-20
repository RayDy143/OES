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
    }

 ?>
