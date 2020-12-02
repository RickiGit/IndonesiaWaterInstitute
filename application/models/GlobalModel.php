<?php
    class GlobalModel extends CI_Model{
        
        public function getAll($table){
            $query = $this->db->get($table);
            return $query->result_array();
        }

        public function getById($table, $id){
            return $this->db->get_where($table, ["id" => $id])->row_array();
        }

        public function insert($table, $data){
            $this->db->insert($table, $data);
        }

        public function update($table, $data, $id){
            $this->db->where('id', $id);
            $this->db->update($table, $data);
        }

        public function delete($table, $id){
            $this->db->where('id', $id);
            $this->db->delete($table);
        }
    }
?>