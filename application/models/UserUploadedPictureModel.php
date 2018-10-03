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
			$deleteWhere = array('UserID' => $_SESSION['UserID'] );
			$deleteData = array('IsCurrent' => 0 );
			$this->db->where($deleteWhere);
			$this->db->update('useruploadedpicture',$deleteData);
			$this->db->insert('uploadedpicture',$fields);
			$picid=$this->db->insert_id();
			$data = array('UserID' => $_SESSION['UserID'],'UploadedPictureID'=> $picid);
			$this->db->insert('useruploadedpicture',$data);
		}
	}
 ?>
