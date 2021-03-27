<?php
include("../usrdb.php");
include("../util.php");
$success = false;
$code = 0;
$data = null;
if(!isset($_GET["r"])) {
  $_GET["r"] = 999999;
}
switch($_GET["r"]) {
  case 0: // Get API version
    $data = array(
      "version" => 1.0,
    );
    $success = true;
    break;
  case 1: // Get Stats
    $success = true;
    $data = array(
      "posts" => count($threads),
      "users" => count($users),
      "groups" => count($groups),
      "mods" => count($mods),
      "games" => count($games),
    );
    break;
  case 2: // Get Mod by ID
    $success = true;
    $data = $mods[$_GET["id"]];
    break;
  case 3: // Get Game by ID
    $success = true;
    $data = $games[$_GET["id"]];
    break;
  case 4: // Get Games List
    $success = true;
    $data = $games;
    break;
}
header("Content-Type: application/json");
echo json_encode(array("success"=>$success,"code"=>$code,"data"=>$data),"method"=>"RDMApi");
?>