<?php
    /**
     *
     */
    class NasGradesModel extends CI_Model
    {
        public function getSchoolyear($nasid)
        {
            $query=$this->db->query("SELECT DISTINCT Schoolyear FROM nasgrades where NasID='$nasid' and IsDeleted=0");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function getLowest($id,$sy,$sem)
        {
            $query=$this->db->query("SELECT MAX(Grade) as Grade FROM nasgrades where NasID='$id' and Schoolyear='$sy' and Semester='$sem' and IsDeleted=0");
            if($query->num_rows()>0){
                return $query->row();
            }else{
                return false;
            }
        }
        public function importGrade($fields)
        {
            $this->db->insert('nasgrades',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function getGrade($sy,$sem,$nasid)
        {
            $query=$this->db->query("SELECT * FROM nasgrades where NasID='$nasid' and Schoolyear='$sy' and Semester='$sem' and IsDeleted=0");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function updateGrade($where,$fields)
        {
            $this->db->where($where);
            $this->db->update('nasgrades',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function deleteGrade($where)
        {
            $fields = array('IsDeleted' => 1);
            $this->db->where($where);
            $this->db->update('nasgrades',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
    }

 ?>
