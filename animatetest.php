
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
	function init(){
		setInterval(draw_circle,20);
	}
	var radius=10;
	var alpha = 0;


	function draw_circle(){
	    var canvas = document.getElementById('special');
	    var ctx = canvas.getContext('2d');
	    ctx.clearRect(0,0,canvas.width,canvas.height);
	    
	    ctx.save();
	    
	    ctx.translate(canvas.width/2,canvas.height/2);
	    ctx.fillStyle = 'rgba(0,100,200,'+alpha+')';
	    ctx.beginPath();
	    ctx.arc(0,0,radius,0,Math.PI*2,false);
	    ctx.fill();
	    
	    if(radius >= 100) {
	        radius = 0;
	    } else {
	        radius+=1;
	    }
	    
	    if(alpha <= 0){
	        alpha=1;
	    } else {
	        alpha-=.01;
	    }
	    
	    ctx.restore();
	}
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
