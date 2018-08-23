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
        public function getSchedule($shiftid){
            if($shifid="All"){
                $query=$this->db->query("SELECT * FROM schedule inner join shift on schedule.ShiftID=shift.ShiftID where schedule.IsDeleted=0 and shift.IsDeleted=0");
                if($query->num_rows()>0){
                    return $query->result_array();
                }else{
                    return false;
                }
            }else{
                $query=$this->db->query("SELECT * FROM schedule inner join shift on schedule.ShiftID=shift.ShiftID where schedule.IsDeleted=0 and shift.IsDeleted=0 and shift.ShiftID='$shiftid'");
                if($query->num_rows()>0){
                    return $query->result_array();
                }else{
                    return false;
                }
            }
        }
        public function getSchedulebyID($id){
            $query=$this->db->query("SELECT * FROM schedule inner join shift on schedule.ShiftID=shift.ShiftID where schedule.ScheduleID='$id'");
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
