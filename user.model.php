<?php

require_once 'object.model.php';


class User extends Object {

  public $ip = '';//$_SERVER['REMOTE_ADDR'];

  public $browser = '';//$_SERVER['HTTP_USER_AGENT'];

  public $load_time = '';

  public $device = '';

  public $preference = '';

  public $comments = '';

  public $state = -1;

  public function __construct() {

    // we need to assign these values in the contructor
    $this->ip = $_SERVER['REMOTE_ADDR'];
    $this->browser = $_SERVER['HTTP_USER_AGENT'];
  }

}


?>