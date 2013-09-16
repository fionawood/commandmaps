<?php

/**
 *
 * AJAX interface to store in database
 *
 * EXAMPLE USAGE
 * 
 * http://monster.krash.net/cs279/commandmaps/record.php?type=click&data={x:10,y:10...}
 *
 *
 */

// we define a valid entry point
define('__COMMANDMAPS_ENTRY_POINT__', 666);


// include the configuration
require_once('config.inc.php');

require_once('mapper.class.php');

require_once('click.model.php');

// we need a type
if (isset($_GET['type'])) {

  $type = $_GET['type'];

} else if (isset($_POST['type'])) {

  $type = $_POST['type'];

}

if (!isset($type)) {

  die('we need a type');

}


// we need some data
if (isset($_GET['data'])) {

  $data = $_GET['data'];

} else if (isset($_POST['data'])) {

  $data = $_POST['data'];

}


if (!isset($data)) {

  die('we need some data');

}

// here we have some data and a type (for sure)
$object = json_decode($data);

if (!$object) {

  // something went wrong
  die('could not parse JSON');

}


// create an object based on the type
switch($type) {

  case 'click':

    

    break;

}

// loop through all properties of the JSON object
foreach($object as $key => $value) {

  echo $key."->".$value;


}



?>