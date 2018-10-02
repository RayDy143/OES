<?php
    /**
     *
     */
    class DTRModel extends CI_Model
    {
        public function Insert($fields)
        {
            $this->db->insert('dtr',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function Get($where)
        {
            $this->db->where($where);
            $query=$this->db->get('dtr');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return true;
            }
        }
        public function checkDuplicateDate($id,$date,$type)
        {
            $query=$this->db->query("SELECT * FROM dtr where IDNumber='$id' and DateString='$date' and Type='$type'");
            if($query->num_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function checkPresent($where)
        {
            $this->db->where($where);
            $query=$this->db->get('dtr');
            if($query->num_rows()>=2){
                return true;
            }else{
                return false;
            }
        }
        public function getNasAttendance($where)
        {
            $this->db->where($where);
            $this->db->order_by("Date", "asc");
            $query=$this->db->get('dtr');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function getNumberOfLates($id,$sy,$sem,$month)
        {
            $query=$this->db->query("SELECT SUM(MinutesLacking) as Late FROM dtr where IDNumber='$id' and Schoolyear='$sy' and Semester='$sem' and Month='$month' and MinutesLacking!=0 and Type='Time in'");
            if($query->num_rows()>0){
                return $query->row();
            }else{
                return 0;
            }
        }
        public function getSchoolyear()
        {
            $query=$this->db->query("SELECT DISTINCT(Schoolyear) as SY from dtr");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function getMonth()
        {
            $query=$this->db->query("SELECT DISTINCT(Month) as Month from dtr");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
    }

 ?>
