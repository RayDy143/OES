<?php 
	/**
	 * 
	 */
	class UserUploadedPictureModel extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function insertProfilePic($fields){
			$this->db->insert('uploadedpicture',$fields);
			$picid=$this->db->insert_id();
			$data = array('UserID' => $_SESSION['UserID'],'UploadedPictureID'=> $picid);
			$this->db->insert('useruploadedpicture',$data);
		}
	}
 ?>