
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="../stylesheet.css" >

<title>Javascript Canvas Animation</title>
<style>
pre { 
border-left:3px double blue;
color:red;
padding-left:10px;
}
canvas {
	border:1px solid black;
	-moz-box-shadow:3px 3px 2px #ccc;
	-webkit-box-shadow:3px 3px 2px #ccc;
	box-shadow:3px 3px 2px #ccc;
	margin:5px;
}

</style>
<script>

	function init(){
		
		setInterval(draw_ex01,20);
	}
	
	var radius = 10;
	var alpha = 1;
	var angle = 0;
	var radius2 = 100;

	function draw_ex01(){
		var canvas = document.getElementById('ex01');
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
<body onload='init()'>
<canvas id="ex01" width='400px' height='300px'></canvas>

</body>
</html>
