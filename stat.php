<html>
<head></head>
<body>
<table border=1>
<tr>
<td>User ID</td>
<td>MTurk ID</td>
<td>MTurk Code</td>
<td>Browser</td>
<td>Device</td>
<td>Preference</td>
<td>Comments</td>
<td>Sequence</td>
<td>Avg. Clicktime Commandmaps</td>
<td>Avg. Clicktime Ribbons</td>
<td>Difference</td>
</tr>
<?php



// we define a valid entry point
define('__COMMANDMAPS_ENTRY_POINT__', 666);


// include the configuration
require_once('config.inc.php');

require_once('db.class.php');

require_once('mapper.class.php');


// the models
require_once('click.model.php');
require_once('user.model.php');

$users = DB::getInstance()->execute('SELECT id FROM user WHERE state=100');

foreach ($users as $key => $value) {
  
  $user_id = $value[0][1];

  $user = Mapper::getStatic('user', $user_id);
  $user = $user['user'][0];

  $commandmap_vals = DB::getInstance()->execute('SELECT * FROM `commandmap_avg` WHERE user_id='.$user->id);
  $ribbon_vals = DB::getInstance()->execute('SELECT * FROM `ribbon_avg` WHERE user_id='.$user->id);


  ?>
  <tr>
  <td><?php echo $user->id; ?></td>
  <td><?php echo $user->mturk_id; ?></td>
  <td><?php echo $user->mturk_code; ?></td>
  <td><?php echo $user->browser; ?></td>
  <td><?php echo $user->device; ?></td>
  <td><?php echo $user->preference; ?></td>
  <td><?php echo $user->comments; ?></td>
  <td><?php echo $user->sequence; ?></td>
  <td><?php echo $commandmap_vals[0][1][1]; ?></td>
  <td><?php echo $ribbon_vals[0][1][1]; ?></td>
  <td><?php echo $ribbon_vals[0][1][1]-$commandmap_vals[0][1][1]; ?></td>
  </tr>
  <?php

}


?>
</table>
</body>
</html>