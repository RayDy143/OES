<?php
    /**
     *
     */
    class NasEvaluationModel extends CI_Model
    {
        public function Insert($fields)
        {
            $this->db->insert($fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
    }

?>
