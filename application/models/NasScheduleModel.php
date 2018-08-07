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
            $query=$this->db->query("SELECT * FROM nas inner join nasschedule on nas.NasID=nasschedule.NasID where IsCurrent=1 and ScheduleID='$id'");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
    }

 ?>
