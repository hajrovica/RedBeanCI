<?php

require('rb.php');
R::setup('mysql:host=localhost;dbname=rb','root','');
R::nuke();
foreach(array('Joe','Pete','Lenny') as $p) {
	$person = R::dispense('person');
	$person->name = $p;
	R::store($person);
}

foreach(array('Feature','Bug','Research') as $c) {
	$category = R::dispense('category');
	$category->label = $c;
	R::store($category);
}
$task = R::dispense('task');
$task->description = 'Deploy';
R::store($task);