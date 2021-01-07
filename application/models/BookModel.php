<?php
    class BookModel extends CI_Model{
        public function getAllRequest(){
            $query = $this->db->query("SELECT a.id, a.name, a.email, a.company, a.position, b.title as book FROM request as a INNER JOIN book as b ON a.idbook = b.id");
            return $query->result_array();
        }
    }
?>