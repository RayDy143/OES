<?php
    /**
     *
     */
    class DayModel extends CI_Model
    {
        public function getDay()
        {
            $query=$this->db->get('day');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
    }

 ?>
