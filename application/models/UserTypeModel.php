<?php
    /**
     *
     */
    class UserTypeModel extends CI_Model
    {
        public function getUserType()
        {
            $query=$this->db->get('usertype');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
    }

 ?>
