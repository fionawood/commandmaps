<?php

require_once 'object.model.php';


class Click extends Object {

  public $user_id = 0;

  public $x = 0;

  public $y = 0;

  public $icon = '';

  public $correct = 0;

  public $click_time = -1;

  public $click_currmenu = '';

}


?>