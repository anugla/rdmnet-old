<?php

// OAuth permissions 
// Post Admin User Meta All
// POST - Post threads on the forum
// ADMIN - Access user admin 
// USER - Modify user information
// META
// ALL - Use all permissions 

include("../usrdb.php");
include("../util.php");
function isSecure() {
  return
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || $_SERVER['SERVER_PORT'] == 443;
}
if(isSecure()) {
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: https://rdmnet.emplemus.repl.co/back/svc/secure/auth.php?r=0");
  exit();
}
$success = false;
$code = 0;
$data = null;
if(!isset($_GET["r"])) {
  $_GET["r"] = 999999;
}
switch($_GET["r"]) {
  case 0: // Get OAuth version
    $data = array(
      "version" => 1.0,
    );
    $success = true;
    break;
  case 1: 
    break;
}
header("Content-Type: application/json");
echo json_encode(array("success"=>$success,"code"=>$code,"data"=>$data,"method"=>"RDMAuthAPI"));
?>