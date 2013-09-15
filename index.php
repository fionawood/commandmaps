<?php

// we define a valid entry point
define('__COMMANDMAPS_ENTRY_POINT__', 666);

//define('CHRIS_CONFIG_DEBUG', true);

// include the configuration
require_once ('config.inc.php');


require_once('mapper.class.php');

require_once('click.model.php');

$click = new Click();
$click->user_id = 0;
$click->x = 10;
$click->y = 11;
$click->click_time = 1000;
$click_currmenu = 'view';

Mapper::add($click);


?>
