<?php
	/**
	 *
	 */
	class DepartmentModel extends CI_Model
	{
		public function getAllDepartment(){
			$query=$this->db->get('department');
			if($query){
				return $query->result_array();
			}else{
				return false;
			}
		}
		public function AddDepartment($fields){
			$this->db->insert('department',$fields);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function DeleteDepartment($userid){
			$this->db->where('DepartmentID',$userid);
			$this->db->delete('department');
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
	}
 ?>
