<?php
include("../usrdb.php");

$success = true;
$code = 0;
$data = null;
if(!isset($_GET["r"])) {
  $_GET["r"] = 999999;
}
switch($_GET["r"]) {
  case 0: // Get Thread by ID
    $data = $threads[$_GET["p"]];
    $success = true;
    break;
  case 1: // Get replies from Thread ID
    $thread = $threads[$_GET["p"]];
    $data = array(
      "thread" => $thread,
      "replies" => array()
    );
    foreach($threads as $threadReply) {
      if($threadReply["reply"]) {
        if($threadReply["replyTo"] == $_GET["p"]) {
          array_push($data["replies"],$threadReply);
        }
      }
    }
    break;
  default:
    success = false;
    break;
}
header("Content-Type: application/json");
echo json_encode(array("success"=>$success,"code"=>$code,"data"=>$data,"method"=>"ForumAPI"));
?>