<?php

// permissions binary data:
// Post Read Ban UserModify GameAdmin Server Maint PostModify PM PMView GPMView ModModify ModUpload ModDelete GModDelete GModModify Immune Headmin ImmuneGrant
// POST - may post on forums
// READ - may read forum threads
// BAN - may ban other members
// USERMODIFY - may modify other users 
// GAMEADMIN - mod admin (optional)
// SERVER - able to modify RDMNet servers
// MAINT - can use maint functions 
// POSTMODIFY - may modify other posts 
// PM - may send private messages
// PMVIEW - may read private messages 
// GPMVIEW - may read all private messages 
// MODMODIFY - may modify your own mod 
// MODUPLOAD - may upload mods 
// MODDELETE - may delete own mod
// GMODDELETE - may delete all mods 
// GMODMODIFY - may modify all mods 
// IMMUNE - immune to getting affected by other mods unless Headmin
// HEADMIN - grant all powers and can modify IMMUNE users
// IMMUNEGRANT - grant other users IMMUNE and may remove IMMUNE
// SERVERJOIN - grant ability to join servers (wont show server menu on site and if connecting with account can make connecting impossible)

$USER_GUEST           = 0b01000000000000000001;
$USER_NEWLYREGISTERED = 0b01000000110000000001; 
$USER_AUTOCONFIRMED   = 0b11000000110111000001;
$USER_MODERATOR       = 0b11011000110111000001;
$USER_ADMIN           = 0b11111110110111110001;
$USER_HEADMIN         = 0b11111111111111111111;
$USER_BANNED          = 0b01000000010000000000;
$GLOBALS["PERMISSIONS_GUEST"] = &$USER_GUEST;
$GLOBALS["PERMISSIONS_NEWLYREGISTERED"] = &$USER_NEWLYREGISTERED;
$GLOBALS["PERMISSIONS_AUTOCONFIRMED"] = &$USER_AUTOCONFIRMED;
$GLOBALS["PERMISSIONS_MODERATOR"] = &$USER_MODERATOR;
$GLOBALS["PERMISSIONS_ADMIN"] = &$USER_ADMIN;
$GLOBALS["PERMISSIONS_HEADMIN"] = &$USER_HEADMIN;
$GLOBALS["PERMISSIONS_BANNED"] = &$USER_BANNED;
$groups = array(
  'Announcements',
  'General Discussion',
  'Mods',
  'Help',
);
$GLOBALS["ANNOUNCEMENTS"] = null;
$GLOBALS["USERS"] = null;
$GLOBALS["THREADS"] = null;
$GLOBALS["PROGRAMS"] = null;
$GLOBALS["MODS"] = null;
$GLOBALS["PAGE"] = false;
$threads = &$GLOBALS["THREADS"];
$programs = &$GLOBALS["PROGRAMS"];
$users = &$GLOBALS["USERS"];
$mods = &$GLOBALS["MODS"];
$games = &$GLOBALS["GAMES"];
$globalAnnouncements = &$GLOBALS["ANNOUNCEMENTS"];

function initialize() {
  $globalAnnouncements = array(
    "This is a prototype. All content on the site is not 100% representative of the finished product."
  );
  $GLOBALS["ANNOUNCEMENTS"] = $globalAnnouncements;
  $games = array(
    "Desktops", // 0
    "Half-Life 1", // 1
    "Source Engine", // 2
    "Quake", // 3
    "QuakeWorld", // 4
    "Quake II", // 5
    "Quake III Arena", // 6
    "Doom", // 7
    "The Internet", // 8
    "Other", // 9
    "BYOND", // 10
  );
  $GLOBALS["GAMES"] = $games;
}

function loadUsers() {
  if($GLOBALS["PAGE"])
    echo "<!-- users loaded -->";
  $users_loc = array(
    array(
      "user" => "Admin",
      "icon" => "gear",
      "joined" => 1610660021,
      "siggy" => "Signature",
      "posts" => 1,
      "permissions" => $USER_HEADMIN,
      "color" => array(127,127,127),
      "banned" => false,
      "private" => array(
        "email" => "mail@mail.mail",
        "password" => "Hash",
      )
    ),
    array(
      "user" => "Reply Guy",
      "icon" => "none",
      "joined" => 1610661021,
      "siggy" => "I am the guy who replies",
      "posts" => 1,
      "permissions" => $USER_ADMIN,
      "color" => array(127,127,127),
      "banned" => false,
      "private" => array(
        "email" => "mail@mail.mail",
        "password" => "Hash",
      )
    ),
    array(
      "user" => "Username Guy!*&?#!@)()%!*)^\\1234567890<h1>Hello</h1>",
      "icon" => "none",
      "joined" => 1610661021,
      "siggy" => "I have a crazy signature<h1>Hello</h1><small>Small</small>",
      "posts" => 1,
      "permissions" => $USER_GUEST,
      "color" => array(127,127,127),
      "banned" => false,
      "private" => array(
        "email" => "mail@mail.mail",
        "password" => "Hash",
      )
    )
  );
  $GLOBALS["USERS"] = $users_loc;
}

function loadThreads() {
  if($GLOBALS["PAGE"])
    echo "<!-- threads loaded -->";
  $threads_loc = array(
    array(
      "title" => "Thread 0",
      "group" => 0,
      "content" => "Content",
      "from" => 0,
      "reply" => false,
      "replyTo" => null,
    ),
    array(
      "title" => "Re: Thread 0",
      "group" => 0,
      "content" => "Reply Content with markdown: **bold** and *italic* and ***bold italic*** and ~~strikethrough~~",
      "from" => 1,
      "reply" => true,
      "replyTo" => 0,
    ),
    array(
      "title" => "Re: Thread 0",
      "group" => 0,
      "content" => "<h1>This shouldnt be allowed</h1><p>Hello</p><?php echo 'hello world'?>",
      "from" => 2,
      "reply" => true,
      "replyTo" => 0,
    ),
    array(
      "title" => "Thread 1",
      "group" => 0,
      "content" => "<h1>This shouldnt be allowed</h1><p>Hello</p><?php echo 'hello world'?>",
      "from" => 2,
      "reply" => false,
      "replyTo" => 0,
    )
  );
  $GLOBALS["THREADS"] = $threads_loc;
}

function loadPrograms() {
  if($GLOBALS["PAGE"])
    echo "<!-- programs loaded -->";
  $programs_loc = array(
    array(
      "name" => "Program 0",
      "key" => "PrivateProgramKey",
      "owner" => 0,
    )
  );
  $GLOBALS["PROGRAMS"] = $programs_loc;
}

function loadMods() {
  if($GLOBALS["PAGE"])
    echo "<!-- mods loaded -->";
  $mods_loc = array(
    array(
      "name" => "Trebuchet",
      "url" => "https://trebuchet.ipwnu.cf",
      "thumb" => "trebuchet.png",
      "tags" => "3d test indev",
      "description" => "3D testing three.js game.",
      "settings" => array(
        "httpMod" => true
      ),
      "available" => true,
      "game" => 8,
    )
  );
  $GLOBALS["MODS"] = $mods_loc;
}

function writeWarnStringArray($arr) {
  foreach($arr as $i) {
    writeWarn($i); // doesnt include util like a boss
  }
}

function getThreadsInGroup($group,$globalthreads) {
  $threadRet = array();
  foreach($globalthreads as $thread) {
    if($thread["group"] == $group)
      array_push($threadRet,$thread);
  }
  return $threadRet;
}

function makeUsernameSafe($userId,$userGroup) {
  return preg_replace("/[^A-Za-z0-9. ]/", '_', str_replace(' ','.',$userGroup[$userId]["user"]));
}

function getGroupNameByPermissions($permissions) {
  switch($permissions) {
    case $GLOBALS["PERMISSIONS_GUEST"]:
      return "Guest";
    case $GLOBALS["PERMISSIONS_NEWLYREGISTERED"]:
      return "Newly Registered";
    case $GLOBALS["PERMISSIONS_AUTOCONFIRMED"]:
      return "User";
    case $GLOBALS["PERMISSIONS_MODERATOR"]:
      return "Moderator";
    case $GLOBALS["PERMISSIONS_ADMIN"]:
      return "Admin";
    case $GLOBALS["PERMISSIONS_HEADMIN"]:
      return "Head Admin";
    case $GLOBALS["PERMISSIONS_BANNED"]:
      return "Banned User";
  }
}

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) {
  echo("<h1>You shant be here...</h1>");  
  echo("<code>RDMNet database preinit dump for curious folks<br>Duplicate variables or similar variables (USER_GUEST and PERMISSIONS_GUEST) are for scopes in functions<br>Dont use this in production. Just for debugging and will probably be removed<br>");
  highlight_string("<?php\n\$data =\n" . var_export($GLOBALS, true) . ";\n?>");
  echo("<br>Server info<br>");
  highlight_string("<?php\n\$data =\n" . var_export($_SERVER, true) . ";\n?>");
  echo("</code>");
  echo("<br>Serialization<br>");
  echo("<code>");
  echo(serialize($GLOBALS));
  echo("</code>");
  exit();
}

initialize();

?>