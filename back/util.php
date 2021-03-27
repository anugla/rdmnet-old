<?php
function minimizeCSSsimple($css){
  $css = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $css); // negative look ahead
  $css = preg_replace('/\s{2,}/', ' ', $css);
  $css = preg_replace('/\s*([:;{}])\s*/', '$1', $css);
  $css = preg_replace('/;}/', '}', $css);
return $css;
}
function icon($name) {
  return "/content/icons/" + $name + ".png";
}
function writeWarn($text) {
  echo "<div id='warning'><i>WARNING</i>".$text."</div>";
}
$availableThemes = array(
  "Default",
  "Red (Default)",
  "Blue",
  "Green",
  "Spratlin",
  "Scale",
  "Inversion",
  "Office",
  "Tricolor",
);
function grabRootCssName() {
  if(!isset($_COOKIE["RDMNET_CssTheme"])) {
    return "Default";
  } else {
    return $_COOKIE["RDMNET_CssTheme"];
  }
}
function setCss($cssTheme) {
  $cssThemeSpc = htmlspecialchars($cssTheme);
  setcookie("RDMNET_CssTheme",$cssThemeSpc,time()+(86400 * 365),"/");
}
function grabRootCss() {
  $theme = grabRootCssName();
  switch($theme) {
    case "Tricolor":
      $chance = rand(0,2);
      switch($chance) {
        case 0:
          return file_get_contents(__DIR__ . "/../client/rootdef.css");
        case 1:
          return file_get_contents(__DIR__ . "/../client/rootgrn.css");
        case 2:
          return file_get_contents(__DIR__ . "/../client/rootblu.css");
      }
      break;
    case "Philly":
      return file_get_contents(__DIR__ . "/../client/rootphi.css");
    case "Spratlin":
      return file_get_contents(__DIR__ . "/../client/rooteli.css");
    case "Green":
      return file_get_contents(__DIR__ . "/../client/rootgrn.css");
    case "Blue":
      return file_get_contents(__DIR__ . "/../client/rootblu.css");
    case "Scale":
      return file_get_contents(__DIR__ . "/../client/rootlig.css");
    case "Inversion":
      return file_get_contents(__DIR__ . "/../client/rootinv.css");
    case "Office":
      return file_get_contents(__DIR__ . "/../client/rootofc.css");
    case "Red":
    case "Default":
    default:
      return file_get_contents(__DIR__ . "/../client/rootdef.css");
  }
}

$cornerAnchor = "𝚿 OOB";
$anchorImage = false;
?>