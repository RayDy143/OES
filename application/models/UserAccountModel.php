<?php
	/**
	 *
	 */
	class UserAccountModel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		public function getAllUsers(){
			/*$this->db->where('Status!=','Deleted');
			$query=$this->db->get('user');*/
			//$uid=$_SESSION['UserID'];
			$query=$this->db->query("SELECT * from uploadedpicture right join useruploadedpicture on uploadedpicture.UploadedPictureID=useruploadedpicture.UploadedPictureID right join useraccount on useruploadedpicture.UserID=useraccount.UserID right join usertype on useraccount.UserTypeID=usertype.UserTypeID inner join department on useraccount.DepartmentID=department.DepartmentID where useraccount.IsDeleted!='1'");
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		function ValidateAccount($userid){
			$query=$this->db->query("UPDATE useraccount set Status='Verified' where UserID='$userid'");
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		function FirstTimeLogin($where,$data){
			$this->db->where($where);
			$this->db->update('useraccount',$data);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function getUserByType($id){
			//$uid=$_SESSION['UserID'];
			$query=$this->db->query("SELECT * from uploadedpicture right join useruploadedpicture on uploadedpicture.UploadedPictureID=useruploadedpicture.UploadedPictureID right join useraccount on useruploadedpicture.UserID=useraccount.UserID inner join usertype on useraccount.UserTypeID=usertype.UserTypeID inner join department on useraccount.DepartmentID=department.DepartmentID where useraccount.IsDeleted!='1' and useraccount.UserTypeID='$id'");
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		public function getUserByDepartment($id){
			//$uid=$_SESSION['UserID'];
			$query=$this->db->query("SELECT * from uploadedpicture right join useruploadedpicture on uploadedpicture.UploadedPictureID=useruploadedpicture.UploadedPictureID right join useraccount on useruploadedpicture.UserID=useraccount.UserID inner join usertype on useraccount.UserTypeID=usertype.UserTypeID inner join department on useraccount.DepartmentID=department.DepartmentID where useraccount.IsDeleted!='1' and department.DepartmentID='$id'");
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		public function getUserByTypeAndDepartment($typeid,$depid){
			//$uid=$_SESSION['UserID'];
			$query=$this->db->query("SELECT * from uploadedpicture right join useruploadedpicture on uploadedpicture.UploadedPictureID=useruploadedpicture.UploadedPictureID right join useraccount on useruploadedpicture.UserID=useraccount.UserID inner join usertype on useraccount.UserTypeID=usertype.UserTypeID inner join department on useraccount.DepartmentID=department.DepartmentID where useraccount.IsDeleted!='1' and department.DepartmentID='$depid' and usertype.UserTypeID='$typeid'");
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		public function CreateUser($data){
			$query=$this->db->insert('useraccount',$data);
			if($query){
				return true;
			}else{
				return false;
			}
		}
		public function DeleteUser($userid){
			$this->db->where('UserID',$userid);
			$data = array('IsDeleted' => 1 );
			$this->db->update('useraccount',$data);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function Authenticate($data){
			$this->db->where($data);
			$query=$this->db->get('useraccount');
			if($query){
				return $query->result_array();
			}else{
				return false;
			}
		}
		public function AddNewUser($data){
			$query=$this->db->insert('useraccount',$data);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function ChangePassword($where,$fields){
			$this->db->where($where);
			$this->db->update('useraccount',$fields);
		}
	}
 ?>
