<?php

class Students extends CI_Model{

    function __construct()
    {
        parent::__construct();


    }

    function get_students(){

        $query = "SELECT * FROM student";
        $result = $this->db->query($query);

        return $result = $result->result();


    }

    function get_students_limited($start_row, $limit){

        $query = "SELECT * FROM student limit $start_row, $limit";
        $result = $this->db->query($query);

        return $result = $result->result();


    }


}
