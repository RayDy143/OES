<?php
    /**
     *
     */
    class LocationModel extends CI_Model
    {
        public function getAllLocation()
        {
            $query=$this->db->get('location');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
    }

 ?>
