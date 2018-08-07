<?php
    /**
     *
     */
    class DailyScheduleModel extends CI_Model
    {

        function __construct()
        {
            parent::__construct();
        }
        public function addDailySched($fields)
        {
            $this->db->insert('dailyschedule',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function checkDuplicate($where){
            $this->db->where($where);
            $query=$this->db->get('dailyschedule');
            if($query->num_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function delete($where){
            $this->db->where($where);
            $this->db->delete('dailyschedule');
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function update($where,$fields)
        {
            $this->db->where($where);
            $query=$this->db->update('dailyschedule',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function getDailySched($where)
        {
            $this->db->where($where);
            $query=$this->db->get('dailyschedule');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
    }

 ?>
