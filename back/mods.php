<?php

include_once("usrdb.php");
loadMods();

$randModId = random_int(0,count($mods)-1);
$randMod = $mods[$randModId];
echo '<p>Try playing <a href="?m=mods&mod='.$randModId.'">this</a> mod for '.$games[$randMod["game"]].'</p><br>';
echo '<a href="?m=mods">All</a>';
$gid = $_GET["gid"];
$gid--;
$x = 1;
foreach($games as $game) {
  echo '<a href="?m=mods&gid='.($x).'">'.$game.'</a>';
  $x++;
}
foreach($mods as $mod) {
  if($mod["game"] == $gid or $gid == -1) {
    echo "<div class='mod'><h1>" . htmlspecialchars($mod["name"]) . "</h1><p><small>Tags: ".$mod["tags"]." Runs on ".$games[$mod["game"]]."</small>";
    $mSettings = $mod["settings"];
    if($mod["available"] == true) {
      if($mSettings["httpMod"] == true) {
        echo "<a href='".$mod["url"]."'>Play now!</a>";
        echo "<small>External website/http source</small>";
      } else {
        echo "<a href='".$mod["url"]."'>Download</a>";
      }
    }
    echo "<br><span align='left'>".$mod["description"]."</span>";
    if($mod["thumb"] != "nil")
      echo "<br><br><img src='/mods/thumbs/".$mod["thumb"]."'><br>";
    else
      echo "<br><br>No thumbnail<br>";
    echo "<br></p></div>";
  }
}

?>