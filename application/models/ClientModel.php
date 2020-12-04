<?php
    class ClientModel extends CI_Model{
        public function getAllClient(){
            $query = $this->db->query("SELECT a.id, a.name, b.name as country FROM client as a INNER JOIN country as b ON a.idcountry = b.id");
            return $query->result_array();
        }
    }
?>