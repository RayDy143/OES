<?php
	/**
	 *
	 */
	class NasUploadedPictureModel extends CI_Model
	{

		function __construct()
		{
			parent::__construct();
		}
		public function insertProfile($nasid,$picid){
			$data = array('NasID' => $nasid,'UploadedPictureID'=>$picid);
			$this->db->insert('nasuploadedpicture',$data);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function updatePicture($nasid){
			$where = array('NasID' => $nasid );
			$data = array('IsCurrent' => 0 );
			$this->db->where($where);
			$this->db->update('nasuploadedpicture',$data);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
	}
 ?>
