
<!DOCTYPE html>
<?php 
require_once('header.php');
?>

<script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>

<link rel="stylesheet" type="text/css" href="/css/result-light.css">

<style type='text/css' media="screen">
	canvas, img {display:block margin:lem auto; border:1px solid black;}
	canvas { background:url(http://monster.krash.net/cs279/commandmaps/gfx/commandmap.png);}
</style>

<script type='text/javascript'>//<![CDATA[ 
	var x = -100;
	var y = -100;
	var time = 0;
	var radius = 0;
	var alpha = 1;

	function draw_circle(){
        var c=document.getElementById("special"); 
        var ctx= c.getContext("2d");
    	ctx.clearRect(0,0,800,600);
        ctx.beginPath();
        ctx.arc(x, y, radius,0, 2*Math.PI);
        ctx.lineWidth = 5;
		ctx.strokeStyle = 'rgba(200,0,0,'+alpha+')';
        ctx.stroke();
		
		if(radius <= 15) {
			radius+=1;
			alpha-=.07;
		} 

	}

$(window).load(function(){
	
	// var radius = 10;
	// var alpha = 1;
	// var x = 100;
	// var y = 100;
	setInterval(draw_circle,30);
	// draw_circle();


	jQuery(document).ready(function(){

	     $("#special").click(function(e){ 

	        x = e.pageX - this.offsetLeft;
	        y = e.pageY - this.offsetTop; 
	        time = e.timeStamp;
	        radius=0;
	        alpha=1;
	        draw_circle();

	        $('#status2').html('position = ' + x +', '+ y + " @ " + time); 
	   }); 
	})  
});//]]>  

</script>


<div style="display:inline-block">
	<div class="box-instr"></br><b>Bold</b></br><img src="gfx/bold.png"></div>
	<div class="box-pic">
		<canvas width="800px" height="600px" style="width: 800px; height: 600px; border:1px ridge green;" id="special"></canvas>
	</div>
</div>

<?php 
require_once('footer.php');
?>