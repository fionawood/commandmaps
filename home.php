<!-- Welcome to the source code of team CS279 CommandMaps! -->
<!DOCTYPE html>
<html>

    <head>
        <link href="styles.css" rel="stylesheet"/>
       
       <?php if (isset($title)): ?>
            <title>it's us. hello!<?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>CS279!</title>
        <?php endif ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src='js/util.js'></script>
        <script src='js/questions.js'></script>
        <script src='js/interaction.js'></script>
        <script src='js/click.model.js'></script>
        <script src='js/user.model.js'></script>
        <script src='js/db.js'></script>


    </head>

    <body>

        <div class="container-fluid">

            <div id="middle">

<script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>

<link rel="stylesheet" type="text/css" href="/css/result-light.css">

<style type='text/css' media="screen">
	canvas, img {display:block margin:lem auto; border:1px solid black;}
	canvas { background:url(http://monster.krash.net/cs279/commandmaps/gfx/commandmap.png);}
</style>


<!-- HOME -->
<div id="home">
<h1 class="title">Designing for You</h1>
Help us study user interface design.
</br></br>

<div style="text-align:left;margin-left:15%">
<div style="text-decoration:underline">Instructions:</div>
<ul>You will see an inset screen of something resembling Microsoft Word 2007.</ul>
<ul>We will give you an icon as your target.</ul>
<ul>Find and click on that target in the inset screen.</ul>
<ul>Then click the <button class="next-btn">Next</button> button for the next icon, your new target.</ul>
</div>

We have 2 interfaces for you to test out! Some practice first. 
</br><h3>Click the next button below to begin.</h3>

<!-- button FROM home TO experiment -->
<button class="next-btn" onclick="$('#home').hide();$('#experiment').show();$('#bottom').hide();">Next</button>
</br>
<div id="bottom">
    CS 279 |  <a>Daniel, Fiona, and Sharon</a>
</div>

</div>

<!-- EXPERIMENT -->
<div id="experiment" style="display:inline-block;display:none;">
	<div class="box-instr"></br><b id='label'>Bold</b></br><img id='icon' src="gfx/bold.png"></div>
	<div class="box-pic">
		<canvas width="800px" height="600px" style="width: 800px; height: 600px; border:1px ridge green;" id="special"></canvas>
	</div>
	<button id="next" class="next-btn" onclick="Q.init_question();" style="display:none;">Next</button>
	<button id="done-btn" class="next-btn" onclick="$('#experiment').hide();$('#questionnaire').show();" style="display:none;">Next</button>
</div>

<!-- QUESTIONNAIRE -->
<div id="questionnaire" style="text-align:left;margin-left:5%;display:none;">
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
<input type="radio" name="device" value="trackpad">Trackpad &nbsp;&nbsp;&nbsp;
<input type="radio" name="device" value="mouse">Other
</br></br>
<b>Comments?</b>
<div style="color:grey;font-size:small"><i>technical difficulties? thoughts in general?</i></div></br>
<form method="post" action="">
<textarea name="comments" id="comments" cols="25" rows="5">
</textarea><br><br>
<button class="next-btn" onclick="$('#questionnaire').hide();$('#finish').show();" style="margin-left:5px;">Next</button>
</form>
</div>

<!-- FINISH end page -->
<div id="finish" style="display:none;">
	<h2>Thank you for participating in our study! We really appreciate your help.</h2>
	<img src="http://i46.tinypic.com/2s7j7yq.jpg"><img src="http://i46.tinypic.com/2s7j7yq.jpg">
</div>