<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Ajax extends CI_Controller
    {
        /**
         * @name        __construct
         *
         * @desc        Load in the model, and validation class
         *
        */

        function __construct()
        {
            parent::__construct();
            // Call the parent constructor

            $this->load->model('Model_user', 'users');
            // Load in the Users Model

            $this->load->library('form_validation');
            // Load in the Form validation library
        }

        /**
 * @name        add
 *
 * @desc        Add a user
 *
*/

function add()
{
    $this->form_validation->set_rules('first_name',     'First Name',       'required|max_length[20]');
    $this->form_validation->set_rules('last_name',      'Last Name',        'required|max_length[20]');
    $this->form_validation->set_rules('dob',            'DoB',              'required|exact_length[10]');
    $this->form_validation->set_rules('gender',         'Gender',           'required|exact_length[1]');
    $this->form_validation->set_rules('email_address',  'Email address',    'required|valid_email|max_length[50]');
    // Set the form validation rules

    if ($this->form_validation->run() != FALSE)
    {
        // Passed the form validation

        $user = array(

            'first_name'    =>  $this->input->post('first_name'),
            'last_name'     =>  $this->input->post('last_name'),
            'dob'           =>  $this->input->post('dob'),
            'gender'        =>  $this->input->post('gender'),
            'email_address' =>  $this->input->post('email_address')

        );
        // Create the data array for the new user

        if ($add = $this->users->add($user))
        {
            // The user was added to the database

            $data = array(
                'users' => $this->users->get($add)
            );
            // Fill the $data['users'] with the array contining the record of the user that's just been added

            $row_html = $this->load->view('table_rows.php', $data, true);
            // Assign the view html of the table row for the new user to $row_html with third TRUE parameter

            $return = array(

                'status'    =>      'success',
                'message'   =>      $this->input->post('first_name').' '.$this->input->post('last_name').' has been
                                    added!',
                'html'      =>      $row_html

            );

            // set the output status, message and table row html

            echo json_encode($return);
            // print out the JSON encoded output

        }
        else
        {
            $return = array(

                'status'    =>      'failed',
                'message'   =>      'Failed to add to the DB'

            );
            echo json_encode($return);
            // return the error message
        }

    }
    else
    {
        $return = array(

            'status'    =>      'failed',
            'message'   =>      validation_errors('', '&lt;br>')

        );
        echo json_encode($return);
        // return the error message

    }

    /**
 * @name        update
 *
 * @desc        Update a user record
 *
*/

function update()
{
    $this->form_validation->set_rules('id',             'User ID',          'required|is_natural_no_zero');
    $this->form_validation->set_rules('first_name',     'First Name',       'required|max_length[20]');
    $this->form_validation->set_rules('last_name',      'Last Name',        'required|max_length[20]');
    $this->form_validation->set_rules('dob',            'DoB',              'required|exact_length[10]');
    $this->form_validation->set_rules('gender',         'Gender',           'required|exact_length[1]');
    $this->form_validation->set_rules('email_address',  'Email address',    'required|valid_email|max_length[50]');
    // Set the form validation rules

    if ($this->form_validation->run() != FALSE)
    {
        // Passed the form validation

        $user = array(

            'first_name'    =>  $this->input->post('first_name'),
            'last_name'     =>  $this->input->post('last_name'),
            'dob'           =>  $this->input->post('dob'),
            'gender'        =>  $this->input->post('gender'),
            'email_address' =>  $this->input->post('email_address')

        );
        // Create the data array

        if ($this->users->update($user, $this->input->post('id')) !== FALSE)
        {
            // The user was updated

            $data = array(
                'users' => $this->users->get($this->input->post('id'))
            );
            // Fill the $data['users'] with the array contining the record of the user that's just been updated

            $row_html = $this->load->view('table_rows.php', $data, true);
            // Assign the view html of the table row for the new user details to $row_html with third TRUE parameter

            $return = array(

                'status'    =>      'success',
                'message'   =>      $this->input->post('first_name').' '.$this->input->post('last_name').' has been
                                    updated!',
                'html'      =>      $row_html

            );
            // set the output status, message and table row html

            echo json_encode($return);
            // print out the JSON encoded success/user details

        }
        else
        {
            $return = array(

                'status'    =>      'failed',
                'message'   =>      'Failed to update User ID #'.$this->input->post('id')

            );
            echo json_encode($return);
            // return the error message
        }

    }
    else
    {
        $return = array(

            'status'    =>      'failed',
            'message'   =>      validation_errors('', '&lt;br>')

        );
        echo json_encode($return);
        // return the error message

    }

    /**
 * @name        delete
 *
 * @desc        Delete a user
 *
*/

function delete()
{
    $this->form_validation->set_rules('id', 'User ID', 'required|is_natural_no_zero');
    // Make sure the User ID is posted, and a non zero natural number (1, 2, 3, ....)

    if ($this->form_validation->run() != FALSE)
    {
        // Validation passed, try to delete the user

        if ($this->users->delete($this->input->post('id')))
        {
            // The user was successfully removed from the table

            $return = array(

                'status'    =>      'success',
                'message'   =>      'The user has been deleted!'

            );

            echo json_encode($return);

            // print out a JSON encoded success message
        }
        else
        {
            // The delete failed

            $return = array(

                'status'    =>      'failed',
                'message'   =>      'Failed to delete User ID #'.$this->input->post('id')

            );

            echo json_encode($return);
            // print out a JSON encoded error message

        }

    }
    else
    {
        // Validation failed or no post data

        $return = array(

            'status'    =>      'failed',
            'message'   =>      validation_errors('', '&lt;br>')

        );

        echo json_encode($return);
        // print out a JSON encoded error message

    }
}

}

}