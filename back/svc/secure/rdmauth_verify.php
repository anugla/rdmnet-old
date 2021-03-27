<html>
  <head>
    <title>RDMAuth</title>
    <!-- view css source at /client/base.css -->
    <!-- make custom rootdefs via reading /client/rootdef.css which is the base of themes -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
      <?php
        $cornerAnchor = "Cant think of anything to put here...";
        $anchorImage = false;
        include("../../../back/util.php");
        echo "/* default vars set */";
        echo minimizeCSSsimple(file_get_contents("../../../client/rootdef.css"));
        echo "/* theme: ".grabRootCssName()." */";
        echo minimizeCSSsimple(grabRootCss());
        echo "/* css */";
        echo minimizeCSSsimple(file_get_contents("../../../client/base.css"));
      ?>
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div id='header'>
      <p><h1 id='titleHeader'>RDMNet</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small id='titleSub'><?php 
        /*$quotes = array(
          "See the show!",
          "Hello World!",
          "Made in PHP",
          "Prototype",
          "Move along, move along",
          "Come inside the shows about to start!",
          "Garunteed to blow your head apart!",
        );
        echo $quotes[rand(0,sizeof($quotes)-1)];*/
        echo "No quote for you, buddy!";
      ?></small></p>
      <!--<div id='links'>
        <p><a href='/?m=home' class="dumblink"><i class="material-icons">home</i>Home</a> <a href='/?m=forum' class="dumblink"><i class="material-icons">forum</i>Forums</a> <a href='/?m=news' class="dumblink"><i class="material-icons">menu</i>News</a> <a href='/?m=mods' class="dumblink"><i class="material-icons">developer_board</i>Mods</a> <a href='/?m=config' class="dumblink"><i class="material-icons">settings</i>Config</a></p>
      </div>
    </div>-->
    <div id='content'>
      <p>
        <h1>RDMAuth Authentication</h1>
        Verify that you are granting this program the correct permissions, and is from a trusted source.
        <br>
        <?php
        include("../../usrdb.php");
        $permissions = $_GET["permissions"];
        $programId = $_GET["program"];

        echo "Program \"".$programs[$programId]["name"]."\" by ".$users[$programs[$programId]["owner"]]["user"]." who is a ".getGroupNameByPermissions($users[$programs[$programId]["owner"]]["permissions"])." wants to";
        if($permissions & 0b10000) {
          echo "<br>- Post threads on the Forums under your name";
        }
        if($permissions & 0b01000) {
          echo "<br>- Use any administrator permissions you have";
        }
        if($permissions & 0b00100) {
          echo "<br>- Modify your user information such as signatures and others";
        }
        if($permissions & 0b00001) {
          echo "<br>- Access everything on your user account<p class='foreboding'>THIS SHOULD ONLY BE GRANTED TO TRUSTED PROGRAMS!! THIS ALLOWS THE PROGRAM TO ACT AS YOU!!</p>";
        }
        $url = "generatedLinkForOauth";
        ?>
      </p>
      <div id='acceptdeclineoauth'>
        <?php 
        echo "<a href='".$url."'>";
        ?>
        <div class='button'>
          Accept
        </div>
        </a>
        <a href="/">
          <div class='button'>
            Decline
          </div>
        </a>
      </div>
    </div>

    <div id='footer'>
      <p>
        <i>USELESS TRADEMARK INFO</i>
        <small>RDMNet is&nbsp;<p class='foreboding'>&copy;opy&reg;ight</p> 2021-2022</small>
        <small>Psychosis Interactive. Diverge any complaints to the Help forum group. Most content here isnt ours, except for the HTML/CSS/PHP code making up the site. Donut steele! Theme: <code><?php 
          echo grabRootCssName();
        ?></code><br><a href='/content/PP.html'>Privacy Policy</a> <a href='/content/TOS.html'>Terms of Service</a></small>
      </p>
    </div>
    <div id='funny'>
      <?php
        if(!$anchorImage)
          echo $cornerAnchor;
        else 
          echo "<img src='".$cornerAnchor."'>";
      ?>
    </div>
  </body>
</html>