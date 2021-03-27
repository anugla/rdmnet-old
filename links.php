<div id='links'>
  <p><a href='/?m=home' class="dumblink"><img src='/content/icons/home.png' class='linkicon' width=16 height=16>Home</a> <a href='/?m=forum' class="dumblink">
  <img src='/content/icons/users.png' class='linkicon' width=16 height=16>Forums</a> <a href='/?m=news' class="dumblink"><img src='/content/icons/newspaper.png' class='linkicon' width=16 height=16>News</a> <a href='/?m=mods' class="dumblink"><img src='/content/icons/scripts-text.png' class='linkicon' width=16 height=16>Mods</a> <a href='/?m=config' class="dumblink"><img src='/content/icons/gear.png' class='linkicon' width=16 height=16>Config</a>
  <?php 
  $sponsorLinks = array(
    array(
      "name" => "RDMNET!!",
      "site" => "/",
      "by" => "oob"
    ),
  );
  
  $sponsorLink = $sponsorLinks[rand(0,sizeof($sponsorLinks)-1)];
  echo "<a href='" .$sponsorLink["site"]. "' class='dumblink'><img src='/content/icons/money-bag-dollar.png' class='linkicon' width=16 height=16>" .$sponsorLink["name"]. "&nbsp;&nbsp;<small><--AD</small></a>";
  ?>
  </p>
</div>