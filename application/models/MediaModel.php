<?php
    class MediaModel extends CI_Model{


        function getNews($number, $offset, $language) {
            return $query = $this->db->get_where('news', array('language' => $language), $number, $offset)->result();
        }
     
        function totalData(){
            return $this->db->get("news")->num_rows();
        }
    }
?>