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
		public function getNas(){
			$query=$this->db->get('nas');
			if($query){
				return $query->result_array();
			}else{
				return false;
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
			$query=$this->db->query("SELECT * FROM department inner join nas on department.DepartmentID=nas.DepartmentID left join nasuploadedpicture on nas.NasID=nasuploadedpicture.NasID left join uploadedpicture on nasuploadedpicture.UploadedPictureID=uploadedpicture.UploadedPictureID where nas.NasID='$id'");
			if($query){
				return $query->row();
			}else{
				return false;
			}
		}
		public function deleteNas($where){
			$this->db->where($where);
			$this->db->delete('nas');
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
	}
 ?>