<?php


// we define a valid entry point
define('__COMMANDMAPS_ENTRY_POINT__', 666);


// include the configuration
require_once('config.inc.php');

require_once('db.class.php');

if (!isset($_GET['user_id'])) {

  die('wrong access.');

}

$id = $_GET['user_id'];

if (!isset($id)) {

  die('wrong access.');

}

$vals = DB::getInstance()->execute('SELECT * FROM `commandmap_avg` ORDER BY `commandmap_avg`.`avg(click_time)` ASC');

$best = $vals[0][1][1];

$current = 0;

$index = 0;

$count = 0;

foreach ($vals as $key => $value) {
  
  $cur_id = $value[0][1];

  $count++;

  if ($cur_id == $id) {

    $cur_time = $value[1][1];

    $index = $key+1;

  }

}

$ret = [];
$ret[] = $cur_time;
$ret[] = $best;
$ret[] = $index;
$ret[] = $count;

echo json_encode($ret);

//echo "{'clicktime':'".$cur_time."','best':'".$best."'}";

?>