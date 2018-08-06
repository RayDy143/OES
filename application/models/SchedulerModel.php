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
    }

 ?>
