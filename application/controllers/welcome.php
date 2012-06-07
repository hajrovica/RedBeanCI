<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct() {
        parent::__construct();
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->view_data['title'] = "Page TITLE!";
		$this->view_data['data'] = "Lipsum and smore tu ff  for all<hr>";
		$this->view_data['data'] .= "<br>Test message DATA carrier";

		$books_count = R::count('book');
		$book = R::load('book', $books_count);

		echo $books_count;

		if (!$book->id) {
			$this->view_data['data'] .= "<p>
				<span>ERROR! Record in DB not found!</span>
			</p>";
		}else{
		$this->view_data['data'] .= "<br>Book title is <b>$book->title</b> and also author is $book->author";
		}

		//Put soome data in table
		// $book = R::dispense('book');
		// $book->title = "DevPHP with Rbeans $book->id";
		// $book->author = "Charles Xavier $book->id";


		// $id = R::store($book);

		// echo $id . "stored $book->title  and $book->author in DB";


		$this->_outpt('welcome_message');
	}


	function opr(){
		//so lets fetch single row to see if title contains 1 in it

		//getRow method AND add it to $arr array
		$arr=R::getRow('select * from book where title like ?', array('%1%'));

		//check if tehre is any result
		if (!$arr) {
			//$arr = $$arr;
			echo "\$arr something wrong array empty!";
		}


		//and print $arr
		print_r ($arr);

		//so we check if ID is equal to 1 and if it is it means that title
		//contains 1 in it and we do not update it
		if ($arr['id'] == 1) {
			echo "Title contains 1 there will be no insert via Rbeans exec method";
		}else{

				//R::exec method clean sql
				if (R::exec('update book set title="Bookt title 1" where id=1')) {
					echo "just updated record id 1 to title wit num 1 at the end non dinamic of course";
				}
		}
			$this->_outpt('welcome_message');
	}


	function lgt(){
		//so lets  mix some php and SQL functions
		//we will echo right from controller no template

		echo "Time function with SELECT NOW()<br>";
		$time = R::$f->now();
		echo $time;

		echo "<br> <br> <br>";

		//lets mix something more complex

		$book = R::$f->begin()
					->select('*')
					->from('book')
					->where('title like ?')
					->put('%t%')
					->get('') ; //cases EMPTY - multidim array with assoc array column - value
							  //row returns one row
							  //with next 2 cases to produce some results we need to pinpoint column not ALL by *
							  //col - flat array of column valuses
							  //cell returns single value
		echo $book;

		echo "<br>
		<br>
		<br><pre>";

		print_r($book);

	}

	function mdl(){
		//$this->load->library('rb');
        $this->load->model('model_welcome');

        //IMPORTANT IMPORTANT dispense NAME and model_NAME
        // must be same for actions on beans to throw messages
        $song = R::dispense('welcome');
        $song->title  = 'bluuuh';
        $song->track = 4;
        $id = R::store($song);
        echo $id;


		//echo $lifeCycle;

		 //echo $this->view_data['lifeCycle'];
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */