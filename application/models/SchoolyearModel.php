<?php
    /**
     *
     */
    class SchoolyearModel extends CI_Model
    {
        public function addSchoolyear($field)
        {
            $this->db->insert('schoolyear',$field);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function getSchoolyear()
        {
            $where = array("IsDeleted"=>0 );
            $this->db->where($where);
            $query=$this->db->get('schoolyear');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function deleteSchoolyear($where)
        {
            $fields = array('IsDeleted' => 1 );
            $this->db->where($where);
            $this->db->update('schoolyear',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
    }

 ?>
