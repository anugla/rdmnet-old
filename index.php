<html>
  <head>
    <title>RDMNet</title>
    <!-- view css source at /client/base.css -->
    <!-- make custom rootdefs via reading /client/rootdef.css which is the base of themes -->
    <!-- fonts -->
    <link rel="preload" as="font" href="/content/font/PFArmaFive.woff2" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" as="font" href="/content/font/PFArmaFive.woff" type="font/woff" crossorigin="anonymous">
    <link rel="preload" as="font" href="/content/font/PFArmaFive.ttf" type="font/ttf" crossorigin="anonymous">
    <link rel="preload" as="font" href="/content/font/PFRondaSeven.woff2" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" as="font" href="/content/font/PFRondaSeven.woff" type="font/woff" crossorigin="anonymous">
    <link rel="preload" as="font" href="/content/font/PFRondaSeven.ttf" type="font/ttf" crossorigin="anonymous">
    <link rel="preload" as="font" href="/content/font/PFRondaSeven-Bold.woff2" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" as="font" href="/content/font/PFRondaSeven-Bold.woff" type="font/woff" crossorigin="anonymous">
    <link rel="preload" as="font" href="/content/font/PFRondaSeven-Bold.ttf" type="font/ttf" crossorigin="anonymous">

    <style>
      <?php
        $cornerAnchor = "Cant think of anything to put here...";
        $anchorImage = false;
        include("back/util.php");
        echo "/* fonts */";
        echo minimizeCSSsimple(file_get_contents("client/fonts.css"));
        echo "/* style */";        
        echo minimizeCSSsimple(file_get_contents("client/rootdef.css"));
        echo "/* theme: ".grabRootCssName()." */";
        echo minimizeCSSsimple(grabRootCss());
        echo "/* css */";
        echo minimizeCSSsimple(file_get_contents("client/base.css"));
      ?>
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div id='header'>
      <p><h1 id='titleHeader'>RDMNet</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small id='titleSub'><?php 
        $quotes = array(
          "See the show!",
          "Hello World!",
          "Made in PHP",
          "Move along, move along!",
          "Come inside, the shows about to start!",
          "Guaranteed, to blow your head apart!",
        );
        echo $quotes[rand(0,sizeof($quotes)-1)];
      ?></small></p>
      <?php 
      include("links.php");
      ?>
    </div>
    <div id='content'>
      <?php
      include("back/usrdb.php");
      $GLOBALS["page"] = true;
      writeWarnStringArray($globalAnnouncements);
      $mode = "home";
      if(isset($_GET["m"])) {
        $mode = $_GET["m"];
      }
      switch($mode) {
        case 'home':
          include('back/home.php');
          break;
        case 'forum':
          include('back/forum.php');
          break;
        case 'news':
          include('back/news.php');
          break;
        case 'mods':
          include('back/mods.php');
          break;
        case 'config':
          include('back/config.php');
          break;
        default:
          include('back/404.php';
          break;
      }
      ?>
    </div>

    <div id='footer'>
      <p>
        <i>USELESS TRADEMARK INFO</i>
        <small>RDMNet is&nbsp;<p class='foreboding'>&copy;opy&reg;ight</p> 2021-2022</small>
        <small>Psychosis Interactive. Diverge any complaints to the Help forum group. Most content here isnt ours, except for the HTML/CSS/PHP code making up the site. Donut steele! Some icons and fonts by <img src="/content/icons/external.png" class="linkicon"><a href="https://p.yusukekamiyamane.com">Yusuke Kamiyamane.</a> Theme: <code><?php 
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