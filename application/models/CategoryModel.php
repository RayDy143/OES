<?php
    /**
     *
     */
    class CategoryModel extends CI_Model
    {
        public function getCategory()
        {
            $where = array('IsDeleted' => 0 );
            $this->db->where($where);
            $query=$this->db->get('category');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function Add($fields)
        {
            $this->db->insert('category',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function Update($where,$fields)
        {
            $this->db->where($where);
            $this->db->update('category',$fields);
            if($this->db->affected_rows()){
                return true;
            }else{
                return false;
            }
        }
        public function Delete($where)
        {
            $fields = array('IsDeleted' => 1 );
            $this->db->where($where);
            $this->db->update('category',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
    }

 ?>
