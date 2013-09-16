<?php 
require_once('header.php');
?>

<div style="text-align:left">
<h3>Some questions:</h3>
Which interface did you prefer?
<form>
<input type="radio" name="preference" value="ribbons">Ribbons<br>
<input type="radio" name="preference" value="cmdmps">Commandmaps
</form>
</br>
What device are you using on your computer?
<form>
<input type="radio" name="device" value="mouse">Mouse<br>
<input type="radio" name="device" value="trackpad">Trackpad
</form>
</br>
Comments?
<div style="color:grey;font-size:small"><i>technical difficulties? thoughts in general?</i></div>
</div>

<button class="next-btn" href="finish.php">Next</button>

<?php 
require_once('footer.php');
?>