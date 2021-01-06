<?php
    class MediaModel extends CI_Model{


        function getMedia($table, $number, $offset, $language) {
            return $query = $this->db->get_where($table, array('language' => $language), $number, $offset)->result();
        }
     
        function totalData(){
            return $this->db->get("news")->num_rows();
        }
    }
?>