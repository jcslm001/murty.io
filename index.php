<?php 
$root=dirname(__FILE__);
$rootKirby=$root.'/kirby';
$rootSite=$root.'/site';
$rootContent=$root.'/content';
if(!file_exists($rootKirby.'/system.php')){ die('The Kirby system could not be loaded'); }
require_once($rootKirby.'/system.php');