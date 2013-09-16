var I = {};

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


  I.interval = null;
  I.clicks = [];
  I.stored = [];


  $("#special").on('click', function(e){ 
    
    if (!I.interval) {
      I.interval = setInterval(draw_circle,30);
    }

    x = e.pageX - this.offsetLeft;
    y = e.pageY - this.offsetTop; 
    time = e.timeStamp;
    radius=0;
    alpha=1;
    draw_circle();

    //$('#status2').html('position = ' + x +', '+ y + " @ " + time); 
    if (Q.validate(x,y)) {

      // correct

      // get time
      var delta = Date.now() - Q.time_start;

      // store the click
      var click = new Click();
      click.user_id = Q.user.id;
      click.x = x;
      click.y = y;
      click.click_time = 1;
      click.click_currmenu = 'view';

      I.clicks.push(click);


      // send ajax to store all clicks in database
      for(var c=0; c<I.clicks.length; c++) {
        DB.store(I.clicks[c], function() {

          console.log('stored click');

          I.stored.push(true);

          if (I.stored.length == I.clicks.length) {

            console.log('all stored');
            $('#next').show();

          }

        });
      }

      

    } else {

      // wrong, play sound

      // store click
      var click = new Click();
      click.user_id = Q.user.id;
      click.x = x;
      click.y = y;
      click.click_time = 1;
      click.click_currmenu = 'view';

      I.clicks.push(click);


    }

  }); 
}