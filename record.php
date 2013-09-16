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

  $data = base64_decode($_GET['data']);

} else if (isset($_POST['data'])) {

  $data = base64_decode($_POST['data']);

}

if (!isset($data)) {

  die('we need some data');

}

// here we have some data and a type (for sure)
$generic_object = json_decode($data);

// create an object based on the type
$real_object = new $type();

// loop through all properties of the JSON object
foreach($generic_object as $key => $value) {

  if ($key == '_classname') continue;

  $real_object->$key = $value;

}

// store the object in the database
echo Mapper::add($real_object);

?>