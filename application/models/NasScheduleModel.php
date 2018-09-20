<?php
    /**
     *
     */
    class NasScheduleModel extends CI_Model
    {

        function __construct()
        {
            parent::__construct();
        }
        public function getNasSchedule($id)
        {
            $query=$this->db->query("SELECT * FROM nas inner join department on nas.DepartmentID=department.DepartmentID inner join nasschedule on nas.NasID=nasschedule.NasID left join nasuploadedpicture on nas.NasID=nasuploadedpicture.NasID left join uploadedpicture on nasuploadedpicture.UploadedPictureID=uploadedpicture.UploadedPictureID where nas.IsDeleted=0 and nasschedule.IsCurrent=1 and nasschedule.ScheduleID='$id' and nasuploadedpicture.IsCurrent=1");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function assignSchedule($fields)
        {
            $this->db->insert('nasschedule',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function reassignSchedule($where)
        {
            $updatefields = array('IsCurrent' => 0 );
            $this->db->where($where);
            $this->db->update('nasschedule',$updatefields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function getSpecificNasSchedule($id)
        {
            $query=$this->db->query("SELECT * from nasschedule inner join schedule on nasschedule.ScheduleID=schedule.ScheduleID inner join shift on schedule.ShiftID=shift.ShiftID where IsCurrent=1 and NasID='$id'");
            if($query->num_rows()>0){
                return $query->row();
            }else{
                return false;
            }
        }
    }

 ?>
