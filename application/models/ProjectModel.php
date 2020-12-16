<?php
    class ProjectModel extends CI_Model{


        function getProject($number,$offset) {
            return $query = $this->db->get_where('projects', array('isactive' => 1), $number, $offset)->result();
        }
     
        function totalData(){
            return $this->db->get("projects")->num_rows();
        }

        function get10RecentProject(){
            $query = $this->db->query("SELECT * FROM projects WHERE isactive = 1 ORDER BY created DESC LIMIT 10");
            return $query->result_array();
        }
    }
?>