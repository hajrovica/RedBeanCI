<?php
require 'rb.php';
require 'StampTE.php';

R::setup('mysql:host=localhost;dbname=rb','root','');

$template = new StampTE(file_get_contents('template.html'));

list($listItem, $pOpt, $cOpt) = $template->collect('listItem|person|category');

echo $template;