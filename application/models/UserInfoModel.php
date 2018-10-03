<?php
	/**
	 *
	 */
	class UserInfoModel extends CI_Model
	{

		function __construct()
		{
			parent::__construct();
		}
		function InsertInfo($data){
			$this->db->insert('userinfo',$data);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		function getUserInfo($id){
			$query=$this->db->query("Select * from userinfo inner join useraccount on userinfo.UserID=useraccount.UserID left join useruploadedpicture on useraccount.UserID=useruploadedpicture.UserID left join uploadedpicture on useruploadedpicture.UploadedPictureID=uploadedpicture.UploadedPictureID where useraccount.UserID='$id' and useruploadedpicture.IsCurrent=1");
			if($query){
				return $query->result_array();
			}else{
				return false;
			}
		}
		function getUserAccountInfo($id){
			$query=$this->db->query("SELECT * from department inner join useraccount on department.DepartmentID=useraccount.DepartmentID left join userinfo on useraccount.UserID=userinfo.UserID left join useruploadedpicture on useraccount.UserID=useruploadedpicture.UserID left join uploadedpicture on useruploadedpicture.UploadedPictureID=uploadedpicture.UploadedPictureID where useraccount.UserID='$id' and useruploadedpicture.IsCurrent=1");
			if($query){
				return $query->row();
			}else{
				return false;
			}
		}
		function editInfo($fields,$where){
			$this->db->where($where);
			$this->db->update('userinfo',$fields);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
	}
 ?>
