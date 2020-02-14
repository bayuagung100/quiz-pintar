<?php
session_start();
error_reporting();
ob_start();
include "vendor/config.php";
include "vendor/func.php";

$content  = (isset($_GET['content'])) ? $_GET['content'] : "home";
$kosong   = true;
$page     = array('home','dashboard/index');
foreach($page as $pg){
  if($content == $pg and $kosong){
    
      include 'website/'.$pg.'.php';
      $kosong = false;
    
  }
}

if($kosong) include 'website/404.php';
?>