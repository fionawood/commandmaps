var I = {};

var menu='home';

I.menuclicknum = 0;
I.clicknum = 0;

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

  // setup the soundmanager
  soundManager.setup({
    url: 'swf/',
    preferFlash: false,
    onready: function() {
      I.scream = soundManager.createSound({
        url: 'audio/scream1.mp3'
      });
      I.beep = soundManager.createSound({
        url: 'audio/beep.mp3'
      });
      I.music = soundManager.createSound({
        url: 'audio/music.mp3'
      });
    }
  });


  $("#special").on('click', function(e){ 
    
    // get time
    var delta = Date.now() - Q.time_start;

    if (!I.interval) {
      I.interval = setInterval(draw_circle,30);
    }

    //
    I.clicknum++;

    x = e.pageX - this.offsetLeft;
    y = e.pageY - this.offsetTop; 
    time = e.timeStamp;
    radius=0;
    alpha=1;
    draw_circle();

    var old_menu = menu;

    if(Q.current_sequence=='Ribbon')  {
      menu = Q.validate_menu(x,y,menu);
      $('canvas').css({'background':"url(gfx/ribbon_"+menu+".png)"});
    } else {
      menu = 'home';
    }

    //$('#status2').html('position = ' + x +', '+ y + " @ " + time); 
    if (Q.validate(x,y,menu)) {

      // correct
      $('#overlay').show();

      // store the click
      var click = new Click();
      click.user_id = Q.user.id;
      click.x = x;
      click.y = y;
      click.icon = Q.current;
      click.correct = 1;
      click.clicknum = I.clicknum;
      click.menuclicknum = I.menuclicknum;
      if (!Q.practice) {
        click.trialnum = Q.trialnum;
      } else {
        click.trialnum = -1;
      }
      click.click_time = delta;
      if (Q.current_sequence == 'Ribbon'){
        click.click_currmenu = menu;
      } else {
        click.click_currmenu = 'commandmap';
      } 

      // reset the menu
      menu = 'home';
      // and the counters
      I.menuclicknum = 0;
      I.clicknum = 0;

      I.clicks.push(click);


      // send ajax to store all clicks in database
      for(var c=0; c<I.clicks.length; c++) {
        DB.store(I.clicks[c], function() {

          //console.log('stored click');

          I.stored.push(true);

          if (I.stored.length == I.clicks.length) {

            //console.log('all stored');
            

            $('#next').show();

          }

        });
      }

    } else {


      // wrong, play sound
      if (menu == old_menu) {
        beep();
      } else {

        // this is a menu switch
        I.menuclicknum++;

      }



      // store click
      var click = new Click();
      click.user_id = Q.user.id;
      click.x = x;
      click.y = y;
      click.correct = 0;
      if (!Q.practice) {
        click.trialnum = Q.trialnum;
      } else {
        click.trialnum = -1;
      }
      click.icon = Q.current;
      click.clicknum = I.clicknum;
      click.click_time = delta;
      click.menuclicknum = I.menuclicknum;
      if (Q.current_sequence == 'Ribbon'){
        click.click_currmenu = menu;
      } else {
        click.click_currmenu = 'commandmap';
      } 

      I.clicks.push(click);
    }

  }); 
}