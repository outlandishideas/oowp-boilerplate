<?php
// default template, used if wordpress' routing doesn't find anything specific for the global post
use Outlandish\Wordpress\OowpBoilerplate\Views\Layout;

$view = new Layout();
$view->render();
