<?php
	/**
	 *
	 */
	 defined('BASEPATH') OR exit('No direct script access allowed');
	class DepartmentModel extends CI_Model
	{
		public function getDepartment($id){
			if($id=="All"){
				$query=$this->db->query('SELECT * FROM department inner join location on department.LocationID=location.LocationID where IsDeleted=0 and DepartmentName!="Admin"');
				if($query->num_rows()>0){
					return $query->result_array();
				}else{
					return false;
				}
			}else{
				$query=$this->db->query("SELECT * FROM department inner join location on department.LocationID=location.LocationID where IsDeleted=0 and DepartmentName!='Admin' and location.LocationID='$id'");
				if($query->num_rows()>0){
					return $query->result_array();
				}else{
					return false;
				}
			}
		}
		public function checkDepartmentExistence($where){
			$this->db->where($where);
			$query=$this->db->get('department');
			if($query->num_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function restoreDepartment($where){
			$field = array('IsDeleted' => 0 );
			$this->db->where($where);
			$this->db->update('department',$field);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function getDepartmentEvaluator($id){
			$query=$this->db->query("SELECT * FROM useraccount left join userinfo on useraccount.UserID=userinfo.UserID where useraccount.DepartmentID='$id' and useraccount.IsDeleted!=1");
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		public function getDepartmentNas($id){
			$query=$this->db->query("SELECT * FROM nas where DepartmentID='$id' and IsDeleted!=1");
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		public function isDepartmentUsed($id){
			$query1=$this->db->query("SELECT * from department inner join useraccount on department.DepartmentID=useraccount.DepartmentID and useraccount.IsDeleted=0 and department.DepartmentID='$id'");
			$query2=$this->db->query("SELECT * from department inner join nas on department.DepartmentID=nas.DepartmentID and nas.IsDeleted=0 and department.DepartmentID='$id'");
			if($query1->num_rows()>0 || $query2->num_rows()>0){
				return true;
			}else{
				return false;
			}
		}
		public function getAllDepartment(){
			$where = array('IsDeleted' => 0 );
			$this->db->where($where);
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
