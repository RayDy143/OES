<?php
    /**
     *
     */
    class SchedulerModel extends CI_Model
    {
        function __construct(){
            parent::__construct();
        }
        public function addSchedule($data)
        {
            $this->db->insert('schedule',$data);
            if($this->db->affected_rows()>0){
                return $this->db->insert_id();
            }else{
                return false;
            }
        }
        public function getSchedule(){
            $this->db->where("IsDeleted",0);
            $query=$this->db->get('schedule');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function getSchedulebyID($where){
            $this->db->where($where);
            $query=$this->db->get('schedule');
            if($query->num_rows()>0){
                return $query->row();
            }else{
                return false;
            }
        }
        public function delete($where)
        {
            $fields = array('IsDeleted' => 1 );
            $this->db->where($where);
            $this->db->update('schedule',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
    }

 ?>
