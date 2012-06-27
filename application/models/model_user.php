<?php
class Model_user extends CI_Model {

function __construct()
    {
        parent::__construct();
    }


    /**
         * @name        get
         *
         * @desc        Get an array of user objects, ordered by descending id
        */

        // function get($id = null)
        // {
        //     $this->db->select('id, first_name, last_name, dob, gender, email_address');
        //     $this->db->from('student');
        //     if (!is_null($id)) {$this->db->where('id', $id);}
        //     $this->db->order_by('id', 'desc');
        //     return $this->db->get()->result();
        // }

        function get(){
            echo "get";
            $this->db->select('*');
            $this->db->from('student');

            return $this->db->get()->result();

        }

        /**
         * @name        add
         *
         * @desc        Add a user into the table
         *
         * @param       data    (array)
        */

        function add($data)
        {
            $this->db->insert('student', $data);
            return $this->db->insert_id();
        }

        /**
         * @name        update
         *
         * @desc        Update a user record
         *
         * @param       id      (int)
         * @param       data    (array)
        */

        function update($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('student', $data);
            return $this->db->affected_rows();
        }

        /**
         * @name        delete
         *
         * @desc        Delete a user record
         *
         * @param       id      (int)
        */

        function delete($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('student');
            return $this->db->affected_rows();
        }

    }

    /* End of file users_model.php */
    /* Location: ./application/models/users_model.php */


