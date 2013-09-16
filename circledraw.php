
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title> - jsFiddle demo</title>
  
  <script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
  
  
  
  <link rel="stylesheet" type="text/css" href="/css/result-light.css">
  
  <style type='text/css' media="screen">
  	canvas, img {display:block margin:lem auto; border:1px solid black;}
  	canvas { background:url(http://monster.krash.net/cs279/commandmaps/gfx/commandmap.png);}
 
  </style>
  

<script type='text/javascript'>//<![CDATA[ 

$(window).load(function(){

	jQuery(document).ready(function(){

	     $("#special").click(function(e){ 

	        var x = e.pageX - this.offsetLeft;
	        var y = e.pageY - this.offsetTop; 

	        var c=document.getElementById("special"); 
	        var ctx= c.getContext("2d");
	        ctx.beginPath();
	        ctx.arc(x, y, 5,0, 2*Math.PI);
	        ctx.fillStyle="red";
	        ctx.fill();
	        ctx.strokeStyle="red";
	        ctx.stroke();

	        $('#status2').html(x +', '+ y); 
	   }); 
	})  
});//]]>  

</script>


</head>
<body>
  <body> 

    <h2 id="status2">0, 0</h2>
    <canvas width="800px" height="600px" style="width: 800px; height: 600px; border:1px ridge green;" id="special">

    </canvas>

</body>
  
</body>


</html>

