<?php
include_once("usrdb.php");
include_once("Parsedown.php");
writeWarn("As this site is static and a prototype, you cannot post on the forums.");

$cmode = "OVERVIEW";
if(isset($_GET["cm"]))
  $cmode = $_GET["cm"];

function parseContent($content) {
  $Parsedown = new Parsedown();
  return $Parsedown->text($content);
}

function writePost($thread,$threads,$groups,$users) {
  echo "<div class='forumpost'><small>posted by " . htmlspecialchars($users[$threads[$thread]["from"]]["user"]) . " (account created on ".date("l j, F Y",intval($users[$threads[$thread["from"]]]["joined"])).")";
  if($users[$threads[$thread]["from"]]["icon"] !== "none") {
    echo "<img src=/content/icons/".$users[$threads[$thread]["from"]]["icon"].".png width=14 height=14>";
  }
  echo "</small>";
  echo "<div class='forumcontentdiv'><p class='forumcontent'>" . parseContent(htmlspecialchars($threads[$thread]["content"])) . '</p></div>';
  echo "<hr>";
  echo "<small><i>" . htmlspecialchars($users[$threads[$thread]["from"]]["siggy"]) . "</i></small></div><br>";
}
function writePostSelf($thread,$threads,$groups,$users) {
  echo "<hr><br><div class='forumpost'><small>posted by " . htmlspecialchars($users[$thread["from"]]["user"]) . " (account created on ".date("l j, F Y",intval($users[$thread["from"]]["joined"])).")";
  if($users[$thread["from"]]["icon"] !== "none") {
    echo "<img src=/content/icons/".$users[$thread["from"]]["icon"].".png width=14 height=14>";
  }
  echo "</small>";
  echo "<div class='forumcontentdiv'><p class='forumcontent'>" . parseContent(htmlspecialchars($thread["content"])) . '</p></div><hr>';
  echo "<hr>";
  echo "<small><i>" . htmlspecialchars($users[$thread["from"]]["siggy"]) . "</i></small></div><br><br>";
}

switch($cmode) {
  case "OVERVIEW":
    echo "<h1>Forums</h1>";
    $x = 0;
    foreach($groups as $group) {
      echo "<h2>&nbsp;<a href='/?m=forum&cm=GROUP&grp=".$x."'>" . $group . "</a></h2>";
      $x++;
    }
    break;
  case "THREAD":
    loadThreads();
    loadUsers();
    $thread = $_GET["thrd"];
    echo "<h1>Thread</h1>";
    echo "<h2><a href='/?m=forum&cm=GROUP&grp=".$threads[$thread]["group"]."'>". $groups[$threads[$thread]["group"]] ."</a> > " . $threads[$thread]["title"] . "</h2>";
    writePost($thread,$threads,$groups,$users);
    $y = 0;
    foreach($threads as $threadReply) {
      if($threadReply["reply"] == true) {
        if($threadReply["replyTo"] == $thread) {
          writePostSelf($threadReply,$threads,$groups,$users);
          $y++;
        }
      }
    }
    break;
  case "GROUP":
    loadThreads();
    loadUsers();
    $group = $_GET["grp"];
    echo "<h1>Group</h1>";
    echo "<h2>" . $groups[$group] . '</h2>';
    $x = 0;
    $posts = 0;
    $threadsInGroup = getThreadsInGroup($group,$threads);
    foreach($threadsInGroup as $thread) {
      if(!$thread["reply"]) {
        echo "<p>&nbsp<a href='/?m=forum&cm=THREAD&thrd=".$x."'>".htmlspecialchars($thread["title"])."</a> by ".htmlspecialchars($users[$thread["from"]]["user"])."</p>";
        $posts++;
      }
      $x++;
    }
    echo "<p><i>".$posts." post(s) in this group.</i></p>";
    break;
}

?>
<small>Using <img src="/content/icons/external.png" class="linkicon"><a href="https://github.com/erusev/parsedown">Parsedown</a> which is Copyright (c) 2013-2018 Emanuil Rusev at erusev.com under the <a href="/content/PDL.txt">MIT license</a>. <i class="foreboding">not by me!</i>
</small>