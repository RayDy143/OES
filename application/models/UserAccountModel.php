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
		public function getAllUsers($roleid,$departmentid){
			/*$this->db->where('Status!=','Deleted');
			$query=$this->db->get('user');*/
			$uid=$_SESSION['UserID'];
			if($roleid=="All" && $departmentid=="All"){
				$query=$this->db->query("SELECT * from uploadedpicture right join useruploadedpicture on uploadedpicture.UploadedPictureID=useruploadedpicture.UploadedPictureID right join useraccount on useruploadedpicture.UserID=useraccount.UserID right join usertype on useraccount.UserTypeID=usertype.UserTypeID inner join department on useraccount.DepartmentID=department.DepartmentID where useraccount.IsDeleted!='1' and useraccount.UserID!='$uid'");
				if($query->num_rows()>0){
					return $query->result_array();
				}else{
					return false;
				}
			}else{
				if($roleid=="All" && $departmentid!="All"){
					$query=$this->db->query("SELECT * from uploadedpicture right join useruploadedpicture on uploadedpicture.UploadedPictureID=useruploadedpicture.UploadedPictureID right join useraccount on useruploadedpicture.UserID=useraccount.UserID inner join usertype on useraccount.UserTypeID=usertype.UserTypeID inner join department on useraccount.DepartmentID=department.DepartmentID where useraccount.IsDeleted!='1' and department.DepartmentID='$departmentid' and useraccount.UserID!='$uid'");
					if($query->num_rows()>0){
						return $query->result_array();
					}else{
						return false;
					}
				}else if($roleid!="All" && $departmentid=="All"){
					$query=$this->db->query("SELECT * from uploadedpicture right join useruploadedpicture on uploadedpicture.UploadedPictureID=useruploadedpicture.UploadedPictureID right join useraccount on useruploadedpicture.UserID=useraccount.UserID inner join usertype on useraccount.UserTypeID=usertype.UserTypeID inner join department on useraccount.DepartmentID=department.DepartmentID where useraccount.IsDeleted!='1' and useraccount.UserTypeID='$roleid' and useraccount.UserID!='$uid'");
					if($query->num_rows()>0){
						return $query->result_array();
					}else{
						return false;
					}
				}else if($roleid!="All" && $departmentid!="All"){
					$query=$this->db->query("SELECT * from uploadedpicture right join useruploadedpicture on uploadedpicture.UploadedPictureID=useruploadedpicture.UploadedPictureID right join useraccount on useruploadedpicture.UserID=useraccount.UserID inner join usertype on useraccount.UserTypeID=usertype.UserTypeID inner join department on useraccount.DepartmentID=department.DepartmentID where useraccount.IsDeleted!='1' and department.DepartmentID='$departmentid' and usertype.UserTypeID='$roleid' and useraccount.UserID!='$uid'");
					if($query->num_rows()>0){
						return $query->result_array();
					}else{
						return false;
					}
				}
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
		public function restoreUser($where){
			$data = array('IsDeleted' => 0 );
			$this->db->where($where);
			$this->db->update('useraccount',$data);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function getUserByTypeAndDepartment($typeid,$depid){
			$uid=$_SESSION['UserID'];

		}
		public function CreateUser($data){
			$this->db->insert('useraccount',$data);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function delete($where){
			$this->db->where($where);
			$this->db->delete('userinfo');
			$this->db->where($where);
			$this->db->delete('useruploadedpicture');
			$this->db->where($where);
			$this->db->delete('userverificationcode');
			$this->db->where($where);
			$this->db->delete('useraccount');
		}
		public function AddAsNewUser($email,$data){
			$query = $this->db->query("SELECT UserID FROM useraccount where Email='$email' LIMIT 1");
			$row = $query->row_array();
			$where = array('UserID' => $row['UserID']);
			$this->delete($where);
			$this->db->insert('useraccount',$data);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function checkEmailExistence($email){
			$query=$this->db->query("SELECT * FROM useraccount where Email='$email'");
			if($query->num_rows()>0){
				return $query->row();
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
