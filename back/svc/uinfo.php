<?php
include("../usrdb.php");

$success = false;
$code = 0;
$data = null;
if(!isset($_GET["r"])) {
  $_GET["r"] = 999999;
}
switch($_GET["r"]) {
  case 0: // Grab User Info
    $data = $users[$_GET["userid"]];
    $data["private"] = null;
    $data["user_safe"] = makeUsernameSafe($_GET["userid"],$users);
    $success = true;
    break;
  case 1: // Grab User ScreenName
    $data = makeUsernameSafe($_GET["userid"],$users);
    break;
  case 2: // Grab User Forum Posts
    $data = array();
    foreach($threads as $thread) {
      if($thread["from"] == $_GET["userid"]) {
        array_push($data,$thread);
        $success = true;
      }
    }
    break;
  default:
    $code = 2;
    $data = "illegal instruction";
    break;
}

header("Content-Type: application/json");
echo json_encode(array("success"=>$success,"code"=>$code,"data"=>$data),"method"=>"UserAPI");
?>