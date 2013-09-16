<?php 
require_once('header.php');
?>

<div style="text-align:left;margin:5%;">
<h3>Some questions:</h3>
<b>Which interface did you prefer?</b></br></br>
<form>
&nbsp;&nbsp;&nbsp;
<input type="radio" name="preference" value="ribbons">Ribbons &nbsp;&nbsp;&nbsp;
<input type="radio" name="preference" value="cmdmps">Commandmaps
</form>
</br></br>
<b>What device are you using on your computer?</b></br></br>
<form>
&nbsp;&nbsp;&nbsp;
<input type="radio" name="device" value="mouse">Mouse &nbsp;&nbsp;&nbsp;
<input type="radio" name="device" value="trackpad">Trackpad
</form>
</br></br>
<b>Comments?</b>
<div style="color:grey;font-size:small"><i>technical difficulties? thoughts in general?</i></div></br>
<form method="post" action="">
<textarea name="comments" id="comments" cols="25" rows="5">
</textarea><br><br>
<button class="next-btn" type="submit" onclick="location.href='finish.php';" style="margin-left:5px;">Next</button>
</form>
</div>

<?php 
require_once('footer.php');
?>