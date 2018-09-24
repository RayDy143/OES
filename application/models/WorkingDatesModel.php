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
                $this->db->insert('workingdates',$fields);
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
            $query=$this->db->get('workingdates');
            if($query->num_rows()>0){
                return true;
            }else{
                return false;
            }
        }
    }

 ?>
