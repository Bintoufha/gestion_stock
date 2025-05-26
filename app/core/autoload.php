<?php
include_once ("config.php");
include_once ("database.php");
include_once ("Controller.php");
include_once ("model.php");
include_once ("app.php");
 spl_autoload_register(function ($class_name)
 {
     require_once('app/models/'.ucfirst($class_name).'.php');
 });
?>