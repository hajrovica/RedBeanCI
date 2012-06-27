<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
*
*/
class Library extends MY_Controller{

    function __construct()
    {
        parent::__construct();
    }


    function index(){
        //echo "<pre>";
        //add student for courses example many  to many
        list($st1, $st2, $st3) = R::dispense('student', 3);

        $st1->name = 'Student6';
        $st1->email = 'student6@email.com';
        $st1->dob = '2012-06-27';
        $st1->gender = 'male';



        R::store($st1);



    }

    function courses(){

        //add student for courses example many  to many
        // list($st1, $st2, $st3) = R::dispense('student', 3);

        // $st1->name = 'Student1';
        // $st1->email = 'student1@email.com';


        // $st2->name = 'Student2';
        // $st2->email = 'student2@email.com';

        // $st3->name = 'Student3';
        // $st3->email = 'student3@email.com';

        // R::store($st1);
        // R::store($st2);
        // R::store($st3);
//********************************************************
         // //create 2 course objects to be stored in 'course' table
        // list($crs1, $crs2) = R::dispense('course', 2);
        // //courses:: adding properties as needed
        //             $crs1->title = 'Course1';
        //             $crs1->start_date = '2012-03-19';
        //             //.... and so on for each course

        //             $crs2->title = 'Course2';
        //             $crs2->start_date = '2012-05-21';
        //             //.... and so on for each course
        // //courses:: Store objects in DB
        //             R::store($crs1);
        //             R::store($crs2);
//********************************************************
        //we can create many to many relation using 2 commands
        //first sharedType and second is R::associate() Method
        //using associate method

        //courses:: lets find students and books
                    $student1 = R::load('student', 3);
                    $student2 = R::load('student', 4);
                    $student3 = R::load('student', 5);
                    //print_r($student1);
        //courses::lets find courses
                    $course1 = R::load('course', 1);
                    $course2 = R::load('course', 2);
                    //echo $course2->id;

        // //courses:: lets associate :)
                    // R::associate($course1, $student1);
                    // R::associate($course1, $student2);

                    // R::associate($course2, $student2);
                    // R::associate($course2, $student3);

           //courses:: accessing data
           //accessing array of students related to course1
                        //$students = R::related($course1, 'student'); //using R::related;

                       //$students1=array();
                       //accessing students related to course 2
                       //$students1 = $course2->sharedStudent[]; //using magic sharedType array - not working php version?

                       //accessing the array of courses related to student1
                       // $courses = R::related($student2, 'course');

                       //accessing array of courses related to student2
                       //$courses = $student2->sharedCourse[]; - again not working ....

                       $students = R::relatedOne($course1, 'student');
                       echo '<pre>';
                       echo $students;
                      // print_r($students);
                        echo "<hr>";
                       print_r($courses);


    }

    function studentbook(){
                //find all books
        $books = R::find('book');
        //print rsult
        echo "<pre>";
        print_r($books);

        //count all books in db and echo out number
        $cnt = R::count('book');
        echo "$cnt" . "<hr>";

        //find one book - last or first? It is first and laos print out founded data
        $book = R::findOne('book');
        print_r($book);

        //So accessing student data from a book object
        echo "Book1 was borowed by {$book->student->name} {$book->student->surname} ";

        //accessing complete array of linked books from a student object

        //first fin the student - there is only one in DB atm
        $student = R::findOne('student');
        echo "<hr> We are finding student (there is only 1 in DB atm): " . $student->id . '---' . $student->name  . $student->surname;

        //lets find books owned by student
        $books = $student->ownBook;

        //print it
        print_r($books);

        //accessing individual properties in linked books from a student object

        $title = $books[1]->title;
        // or in looong way
        $author = $student->ownBook[1]->author;

        echo($title);
        echo " --- $author";


    }

    function _excuted(){

        //creating a 'student' object to be stored in 'student' table

        $student = R::dispense('student');
        $student->setMeta("buildcommand.unique", array(array('email')));


        //adding properties to 'student', as needed
        $student->name = "Name";
        $student->surname="Surname";
        $student->email="name.surname@mail.com";
        $student->adress1="Adress";
        $student->adress2="Adress2";

        //fill other properties for student here
        //END student

        //create 3 book objects to be stored in table 'book'
        list($book1, $book2, $book3) = R::dispense('book', 3);
        //$book1->setMeta("buildcommand.unique", array(array('title')));
        //adding book properties as needed
        $book1->title = 'Book1 title';
        $book1->author = 'Author1';

        $book2->title = 'Book2 title';
        $book2->author = 'Author2';


        $book3->title = 'Book3 title';
        $book3->author = 'Author3';

        //END Book properties


        //lets link books to student with ownType property
        $student->ownBook = array($book1,  $book2, $book3);

        //Store objects
        //added caching of exceptions

        try {
            R::store($student);
            //R::store($book1);
            //R::store($book2);
            //R::store($book3);
        } catch (Exception $e) {
            echo "$e";

        }
        echo "something else";
        // R::store($book1);
        // R::store($book2);
        // R::store($book3);

    }

    function nuke(){

        R::nuke();
    }


}