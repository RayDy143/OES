<?php
    /**
     *
     */
    class QuestionModel extends CI_Model
    {
        public function getQuestion($catid)
        {
            if($catid=="All"){
                $query=$this->db->query('SELECT * FROM question inner join category on question.CategoryID=category.CategoryID where question.IsDeleted=0');
                if($query->num_rows()>0){
                    return $query->result_array();
                }else{
                    return false;
                }
            }else{
                $query=$this->db->query("SELECT * FROM question inner join category on question.CategoryID=category.CategoryID where question.IsDeleted=0 and category.CategoryID='$catid'");
                if($query->num_rows()>0){
                    return $query->result_array();
                }else{
                    return false;
                }
            }
        }
        public function Add($fields)
        {
            $this->db->insert('question',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function Update($where,$fields)
        {
            $this->db->where($where);
            $this->db->update('question',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function Delete($where)
        {
            $fields = array('IsDeleted' => 1 );
            $this->db->where($where);
            $this->db->update('question',$fields);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
    }

 ?>
