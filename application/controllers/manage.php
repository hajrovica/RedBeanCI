<<<<<<< HEAD
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Manage extends MY_Controller
    {


        function index()
        {
            $this->load->model('Model_user', 'users');
            // Load the Users Model with our methods of interacting with the database.

            $users = $this->users->get();
            // Get the array of user records from the database.


        $tpl_data = array(
            'users' =>  $users

            );

        $this->load->view('table/manage.php', $tpl_data);

        }



    }

    /* End of file manage.php */
    /* Location: ./application/controllers/manage.php */

=======
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
*
*/
class Manage extends MY_Controller{

    function index()
    {
        $this->load->model('model_user', 'users');

        $users = $this->users->get();

        //view part
        $tpl_data = array(
            'users'     =>      $users


            );
        $this->load->view('table/manage.php', $tpl_data);


        // echo "<pre>";
        // print_r($users);

        // foreach ($users as $user) {
        //     echo $user->name . "<br>";
        // }
    }




}
>>>>>>> ajax table tutorial
