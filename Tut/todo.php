<?php
require 'rb.php';
require 'StampTE.php';

R::setup('mysql:host=localhost;dbname=rb','root','');

$template = new StampTE(file_get_contents('template.html'));

list($listItem, $pOpt, $cOpt) = $template->collect('listItem|person|category');

$task = R::load('task',  $id);

if (isset($_POST['add'])&& !empty($_POST['task'])) {
    $task = R::dispense('task');
    $task->description=$_POST['task'];
        if (isset($_POST['cats'])) {
            $task->sharedCategory = R::batch('category', $_POST['cats']);
        }

    R::store($task);

    }

if (isset($_POST['trash']) && isset($_POST['done'])) {
    R::trashAll(R::batch('task', $_POST['done']));
}

foreach (R::find('task') as $t) {
   $tags = array();
   foreach ($t->sharedCategory as $c) {
       $tags[]=$c->label;
   }

   $template->glue('listItems',  $listItem->copy()
            ->injectAll(array('description'=>$t->description,
                              'value'=>$t->id,
                              'tags'=>implode(',',$tags)))
    );
}

foreach (R::find('category') as $c) {
   $o = $cOpt->copy()->injectAll(array('value'=>$c->id,  'label'=>$c->label));
   $template->glue('categories', $o);
}

echo $template;