<?php 
	/**
	 * 
	 */
	class UserVerificationCodeModel extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function InsertCode($data){
			$query=$this->db->insert('userverificationcode',$data);
		}
		function CheckCodeValidity($data){
			$this->db->where($data);
			$query=$this->db->get('userverificationcode');
			if(count($query->result_array())>0){
				return $query->result_array();
			}else{
				return false;
			}
		}
		function codeExpiry($where,$data){
			$this->db->where($where);
			$this->db->update('userverificationcode',$data);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}

	}
 ?>