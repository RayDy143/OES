<?php
    /**
     *
     */
    class UploadedPictureModel extends CI_Model
    {

        function __construct()
        {
            parent::__construct();
        }
        public function insertPicture($fields)
        {
            $this->db->insert('uploadedpicture',$fields);
            if($this->db->affected_rows()>0){
                return $this->db->insert_id();
            }else{
                return false;
            }
        }
    }

 ?>
