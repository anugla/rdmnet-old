<?php
include("../util.php");
$theme = $_GET["theme"];

setCss($theme);
header("Location: /")
?>