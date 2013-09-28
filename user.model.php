<?php

require_once 'object.model.php';


class User extends Object {

  public $browser = '';//$_SERVER['HTTP_USER_AGENT'];

  public $load_time = '';

  public $device = '';

  public $preference = '';

  public $comments = '';

  public $sequence = '';

  public $state = -1;

  public $mturk_id = '';

  public $mturk_code = '';

  public function __construct() {

    // we need to assign these values in the contructor
    $this->browser = $_SERVER['HTTP_USER_AGENT'];
  }

}


?>