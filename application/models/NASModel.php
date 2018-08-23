<?php
	/**
	 *
	 */
	class NASModel extends CI_Model
	{

		function __construct()
		{
			parent::__construct();
		}
		public function getNas($id){
			if($id=='All'){
				$query=$this->db->query("SELECT * from nas inner join department on nas.DepartmentID=department.DepartmentID left join nasuploadedpicture on nas.NasID=nasuploadedpicture.NasID left join uploadedpicture on nasuploadedpicture.UploadedPictureID=uploadedpicture.UploadedPictureID where nasuploadedpicture.IsCurrent=1 and nas.IsDeleted=0");
				if($query){
					return $query->result_array();
				}else{
					return false;
				}
			}else{
				$query=$this->db->query("SELECT * from nas inner join department on nas.DepartmentID=department.DepartmentID left join nasuploadedpicture on nas.NasID=nasuploadedpicture.NasID left join uploadedpicture on nasuploadedpicture.UploadedPictureID=uploadedpicture.UploadedPictureID where department.DepartmentID='$id' and nasuploadedpicture.IsCurrent=1 and nas.IsDeleted=0");
				if($query){
					return $query->result_array();
				}else{
					return false;
				}
			}
		}
		public function AddNas($fields){
			$this->db->insert('nas',$fields);
			if($this->db->affected_rows()>0){
				return $this->db->insert_id();
			}else{
				return false;
			}
		}
		public function getNasProfile($id){
			$query=$this->db->query("SELECT * FROM department inner join nas on department.DepartmentID=nas.DepartmentID left join nasuploadedpicture on nas.NasID=nasuploadedpicture.NasID left join uploadedpicture on nasuploadedpicture.UploadedPictureID=uploadedpicture.UploadedPictureID where nas.NasID='$id' and nasuploadedpicture.IsCurrent=1");
			if($query){
				return $query->row();
			}else{
				return false;
			}
		}
		public function update($where,$fields){
			$this->db->where($where);
			$this->db->update('nas',$fields);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function restoreNas($where)
		{
			$fields = array('IsDeleted' => 0 );
			$this->db->where($where);
			$this->db->update('nas',$fields);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function hardDeleteNas($where)
		{
			$this->db->where($where);
			$this->db->delete('nasuploadedpicture');
			$this->db->where($where);
			$this->db->delete('nasschedule');
			$this->db->where($where);
			$this->db->delete('nas');
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function deleteNas($where){
			$field = array('IsDeleted' => 1 );
			$this->db->where($where);
			$this->db->update('nas',$field);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function IsIDNumberExist($where)
		{
			$this->db->where($where);
			$query=$this->db->get('nas');
			if($query->num_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function IsEmailExist($where)
		{
			$this->db->where($where);
			$query=$this->db->get('nas');
			if($query->num_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function IsRecentlyDeleted($where)
		{
			$this->db->where($where);
			$query=$this->db->get('nas');
			if($query->num_rows()>0){
				$row=$query->row();
				return $row->NasID;
			}else{
				return false;
			}
		}
	}
 ?>
