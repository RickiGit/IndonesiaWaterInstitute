<?php
    class ProjectModel extends CI_Model{


        function getProject($number, $offset, $language) {
            if($language == ""){
                $language = 0;
            }
            return $query = $this->db->get_where('projects', array('isactive' => 1, 'language' => $language), $number, $offset)->result();
        }
     
        function totalData(){
            return $this->db->get("projects")->num_rows();
        }

        function get10RecentProject($language){
            if($language == ""){
                $language = 0;
            }
            $query = $this->db->query("SELECT * FROM projects WHERE isactive = 1 AND language = $language ORDER BY created DESC LIMIT 10");
            return $query->result_array();
        }
    }
?>