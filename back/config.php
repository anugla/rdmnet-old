<h1>Themes</h1>
<p>Available Themes: <br>
<?php
foreach($availableThemes as $theme) {
  echo $theme . "<br>";
}
?>
<form action='/back/forms/scss.php'>
  Set Theme (cAsE SeNsItIvE!): <br>
  <input name='theme' type='text'>
  <input type='submit' class='button'>
</form>
Refresh your page after submitting.
</p>