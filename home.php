<!-- Welcome to the source code of team CS279 CommandMaps! -->
<!DOCTYPE html>
<html>

    <head>
        <link href="styles.css" rel="stylesheet"/>
       
       <?php if (isset($title)): ?>
            <title>it's us. hello!<?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Test your reaction time</title>
        <?php endif ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src='js/util.js'></script>
        <script src='js/questions.js'></script>
        <script src='js/interaction.js'></script>
        <script src='js/click.model.js'></script>
        <script src='js/user.model.js'></script>
        <script src='js/db.js'></script>
        <script src='js/soundmanager2-nodebug-jsmin.js'></script>


    </head>

    <body>

        <div class="container-fluid">

            <div id="middle">

<script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>

<!-- <link rel="stylesheet" type="text/css" href="/css/result-light.css"> -->

<style type='text/css' media="screen">
	canvas, img {display:block margin:lem auto; border:1px solid black;}
	canvas { background:url(http://monster.krash.net/cs279/commandmaps/gfx/commandmap.png);}
</style>


<!-- HOME -->
<div id="home">
<h1 class="title">What's your Reaction Time?</h1>
<div style="font-size:20px;">How fast can you click with the aid of <b>concentration</b> music?</div>
<!-- button from HOME to INSTRUCTIONS -->
</br>
<img class="brainimg" src="http://i1123.photobucket.com/albums/l543/hercampusphoto/HCIllinois/Illinois%203/MusicalNotesHead.jpg">
</br></br>
<button class="next-btn" onclick="$('#home').hide();$('#consent').show();">Enter the Challenge</button>
<div id="bottom">
</div>
</div>

<!-- CONSENT FORM -->
<div id="consent" style="display:none">
<div style="margin-left:25%;margin-right:25%;">
<h1 class="title">Statement of Informed Consent</h1>
<div class="content" style="text-align:left;">
<ul>You're about to participate in a research study. Your contribution to our research allows us to learn more about how <b>reaction time increases</b> as a result of an auditory stimulus: "concentration music."</ul>
<ul><i>Please read the following information carefully before proceeding.</i></ul>
<ul><h4>Why we are doing this research</h4></ul>
<ul>We are trying to understand how auditory stimuli affect people's reaction time. We are also trying to understand how command selection time and error rates vary between interfaces with menus and those without. </ul>
<ul><h4>What you will have to do</h4></ul>
<ul>You will be shown an icon and two interfaces: one that employs Microsoft Ribbons, the other that employs a flat hierarchical structure without menus. You will be asked to find and click on the appropriate icon on each interface as quickly as possible. You will have the opportunity to practice on 10 icon targets with each interface before the evaluation, in which 30 icon targets will be shown for each interface. We will also ask you a few basic questions about your preference between interfaces and your computer use. </ul>
<ul><h4>Potential risks</h4></ul>
<ul>There are no risks anticipated in taking part in this study and you are free to leave at any time. </ul>
<ul><h4>Duration</h4></ul>
<ul>Approximately 10 minutes.</ul>
<ul><h4>To contact the researcher</h4></ul>
<ul>If you have questions or concerns about this research, please contact prof. Krzysztof Gajos, Maxwell Dworkin 251, 33 Oxford St, Cambridge, MA 02138, kgajos@seas.harvard.edu</ul>
<ul>Whom to contact about your rights in this research, for questions, concerns, suggestions, or complaints that are not being addressed by the researcher, or research-related harm: Committee on the Use of Human Subjects in Research at Harvard University, 1414 Massachusetts Avenue, Second Floor, Cambridge, MA 02138. Phone: 617-496-2847 (CUHS). Email: cuhs@fas.harvard.edu.</ul>
<ul>By clicking the button below you confirm that you have read and understood the above and agree to take part in this research. Your participation is voluntary and you are free to leave the experiment at any time by simply closing the web browser.</ul>
</div>
</div>
<!-- button from CONSENT FORM to INSTRUCTIONS -->
<button class="next-btn" onclick="$('#consent').hide();$('#instructions').show();">I agree</button>
</br>
<div id="bottom">
</div>
</div>

<!-- INSTRUCTIONS -->
<div id="instructions" style="display:none;">
<div style="margin-left:25%;margin-right:25%;">
<h1 class="title">Instructions</h1>
<div class="content" style="text-align:left;">
<ul>This test will investigate how your speed in a concentration task is affected by an auditory stimulus: "concentration music." You will be shown an icon and its name on the left. Your concentration task is to <b>find that icon</b> in the Microsoft Word menu shown and click on it <b>as fast as possible</b>. There are two rounds of menus.</ul>
<ul>There are 10 practice icons for each round to help you warm up!</ul>
<ul>Go as fast as you can while maintaining accuracy. Your score will be shown at the end, along with how you compared to others.</ul>
<ul>Be sure to turn up your sound! It is important that you hear the concentration music while completing the tasks.</ul>

</div>
</div>
<!-- button from INSTRUCTIONS to EXPERIMENT -->
<button class="next-btn" onclick="Q.init_experiment();">Start</button>
</br>
</div>
<div id="bottom" style="display:none;">
</div>

<!-- EXPERIMENT -->
<div id="experiment" style="display:inline-block;display:none;">
<div class="box-instr"></br><b id='label'>Bold</b></br><img id='icon' src="gfx/bold.png"><br><br><small id='progress'>1/10</small></div>
<div class="box-pic">
	<canvas width="800px" height="600px" style="width: 800px; height: 600px; border:1px ridge green;" id="special"></canvas>
</div>
<div id="overlay" style="display:none;">	
	<button id="next" class="next-btn" onclick="Q.init_question();" style="display:none;">Next</button>
	<button id="done-btn" class="next-btn" onclick="" style="display:none;">Next</button>
</div>
</div>

<!--SCARY GUY-->
<div id='scaryguy' style='display:none'>
<img id='guy' src='http://images.wikia.com/creepypasta/images/2/23/Scary_05.gif'>
</div>

<!-- QUESTIONNAIRE -->
<div id="questionnaire" style="display:none;">
<div style="margin-left:25%;margin-right:25%;">
<h1 class="title">A bit of inquiry...</h1>
<div class="content" style="text-align:left;">
<div style="font-size:20px;">While the system computes the results, we'd like to ask you a few questions:</div>
<b>Which interface did you prefer?</b></br></br>
<form id='interface_form'>
&nbsp;&nbsp;&nbsp;
<input type="radio" name="preference" value="ribbons"><img src='gfx/ribbon_home.png' width=200> &nbsp;&nbsp;&nbsp;
<input type="radio" name="preference" value="commandmaps"><img src='gfx/commandmap.png' width=200>
</form>
</br></br>
<b>What device are you using on your computer?</b></br></br>
<form id='device_form'>
&nbsp;&nbsp;&nbsp;
<input type="radio" name="device" value="mouse">Mouse &nbsp;&nbsp;&nbsp;
<input type="radio" name="device" value="trackpad">Trackpad &nbsp;&nbsp;&nbsp;
<input type="radio" name="device" value="trackball">Trackball &nbsp;&nbsp;&nbsp;
<input type="radio" name="device" value="other">Other
</form>
</br></br>
<b>Comments?</b>
<div style="color:grey;font-size:small"><i>technical difficulties? thoughts in general?</i></div></br>
<form id='comments_form'>
<textarea name="comments" id="comments" cols="25" rows="5">
</textarea><br><br>
</form>
<button class="next-btn" onclick="Q.submit();" style="margin-left:5px;">Submit</button>
</div>
</div>
</div>

<!-- FINISH end page -->
<div id="finish" style="display:none;">
	<h2>Thank you for participating in our study! We really appreciate your help.</h2>

    <h2>You were SSSSCCAAARRRYYY-FAST!!! <div id='ranking'>Ranking: #10/100</div></h2>
    

    <h2>Scare your friends! Send them this link: <a href="http://tinyurl.com/focusmusic" target="_blank">http://tinyurl.com/focusmusic</a></h2>
    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ftinyurl.com/focusmusic" target="_blank">Share on Facebook</a>
</div>