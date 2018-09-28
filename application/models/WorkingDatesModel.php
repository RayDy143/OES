<?php
    /**
     *
     */
    class WorkingDatesModel extends CI_Model
    {
        public function Get()
        {
            $where = array('IsDeleted' => 0 );
            $this->db->where($where);
            $this->db->order_by("Date", "ASC");
            $query=$this->db->get('workingdate');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function GetBySchoolyearAndSemester($where)
        {
            $this->db->where($where);
            $this->db->order_by("Date", "ASC");
            $query=$this->db->get('workingdate');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function GetBySchoolyearAndSemesterAndMonth($where)
        {
            $this->db->where($where);
            $this->db->order_by("Date", "ASC");
            $query=$this->db->get('workingdate');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function Insert($where,$fields)
        {
            if($this->IsDateExist($where)){
                return false;
            }else{
                $this->db->insert('workingdate',$fields);
                if($this->db->affected_rows()>0){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function IsDateExist($where)
        {
            $this->db->where($where);
            $query=$this->db->get('workingdate');
            if($query->num_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function getSchoolyear()
        {
            $query=$this->db->query("SELECT DISTINCT(Schoolyear) as Schoolyear from workingdate where IsDeleted=0");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function Delete($where)
        {
            $fields = array('IsDeleted' => 1);
            $this->db->where($where);
            $this->db->update('workingdate',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
    }

 ?>
