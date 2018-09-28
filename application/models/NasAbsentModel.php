<?php
    /**
     *
     */
    class NasAbsentModel extends CI_Model
    {
        public function Insert($fields)
        {
            $this->db->insert('nasabsent',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function getNasAbsences($where)
        {
            $this->db->where($where);
            $query=$this->db->get('nasabsent');
            return $query->num_rows();
        }
    }

 ?>
