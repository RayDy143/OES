<?php
	/**
	 *
	 */
	class DepartmentModel extends CI_Model
	{
		public function getDepartment(){
			$query=$this->db->query('SELECT * FROM department where IsDeleted=0');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		public function getAllDepartment(){
			$query=$this->db->get('department');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		public function renameDepartment($where,$fields){
			$this->db->where($where);
			$this->db->update('department',$fields);
			if($this->db->affected_rows()>0){
				return true;
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
		public function DeleteDepartment($id){
			$this->db->where('DepartmentID',$id);
			$where = array('IsDeleted' => 1 );
			$this->db->update('department',$where);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
	}
 ?>
