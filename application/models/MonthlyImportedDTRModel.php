<?php
    /**
     *
     */
    class MonthlyImportedDTRModel extends CI_Model
    {
        public function Insert($fields)
        {
            $this->db->insert('monthyimporteddtr',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function CheckIfExisted($where)
        {
            $this->db->where($where);
            $query=$this->db->get('monthyimporteddtr');
            if($query->num_rows()>0){
                return true;
            }else{
                return false;
            }
        }
    }

 ?>
