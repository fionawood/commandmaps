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

window.onload = function() {

  // set up
  Q.setup();


  $("#special").on('click', function(e){ 
    
    setInterval(draw_circle,30);

    x = e.pageX - this.offsetLeft;
    y = e.pageY - this.offsetTop; 
    time = e.timeStamp;
    radius=0;
    alpha=1;
    draw_circle();

    //$('#status2').html('position = ' + x +', '+ y + " @ " + time); 
    console.log(Q.validate(x,y));

  }); 
}