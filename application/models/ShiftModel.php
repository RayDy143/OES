<?php
    /**
     *
     */
    class ShiftModel extends CI_Model
    {
        public function getShift()
        {
            $where = array('IsDeleted' => 0 );
            $this->db->where($where);
            $query=$this->db->get('shift');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
    }

 ?>
