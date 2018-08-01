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
		public function insertProfile($fields,$id){
			$this->db->insert('uploadedpicture',$fields);
			$picid=$this->db->insert_id();
			$data = array('NasID' => $id,'UploadedPictureID'=>$picid);
			$this->db->insert('nasuploadedpicture',$data);
		}
	}
 ?>