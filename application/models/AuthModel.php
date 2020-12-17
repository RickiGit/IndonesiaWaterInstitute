<?php
    class AuthModel extends CI_Model{
        public function getUserById($id){
            return $this->db->get_where('user', ["id" => $id])->row_array();
        }
    }
?>