Q = {};

Q.Commandmap_icons_catalog = {
  
  'bold':{
    'x1':90,
    'y1':80,
    'x2':115,
    'y2':100,
    'tab':'home'
  },
  'center':{
    'x1':310,
    'y1':75,
    'x2':333,
    'y2':100,
    'tab':'home'
  },
  'chart':{
    'x1':230,
    'y1':185,
    'x2':328,
    'y2':209,
    'tab':'insert'
  },
  'picture':{
    'x1':100,
    'y1':160,
    'x2':150,
    'y2':215,
    'tab':'insert'
  },
  'showhide':{
    'x1':390,
    'y1':100,
    'x2':420,
    'y2':120,
    'tab':'home'   
  },
  'zoom':{
    'x1':327,
    'y1':483,
    'x2':378,
    'y2':543,
    'tab':'view'
  }

}

Q.Ribbon_icons_catalog = {
  
  'bold':{
    'x1':90,
    'y1':80,
    'x2':115,
    'y2':100,
    'tab':'home'
  },
  'center':{
    'x1':310,
    'y1':75,
    'x2':333,
    'y2':100,
    'tab':'home'
  },
  'chart':{
    'x1':230,
    'y1':65,
    'x2':328,
    'y2':100,
    'tab':'insert'
  },
  'picture':{
    'x1':100,
    'y1':53,
    'x2':150,
    'y2':110,
    'tab':'insert'
  },
  'showhide':{
    'x1':390,
    'y1':100,
    'x2':420,
    'y2':120,
    'tab':'home'  
  },
  'zoom':{
    'x1':325,
    'y1':50,
    'x2':378,
    'y2':115,
    'tab':'view'
  }

}

Q.Ribbon_menu_catalog = {
  
  'file':{
    'x1':10,
    'y1':30,
    'x2':67,
    'y2':52,
    'tab':'home'
  },
  'home':{
    'x1':67,
    'y1':30,
    'x2':125,
    'y2':52,
    'tab':'home'
  },
  'insert':{
    'x1':125,
    'y1':30,
    'x2':185,
    'y2':52,
    'tab':'insert'
  },
  'pagelayout':{
    'x1':185,
    'y1':30,
    'x2':273,
    'y2':52,
    'tab':'insert'
  },
  'references':{
    'x1':273,
    'y1':30,
    'x2':356,
    'y2':52,
    'tab':'home'  
  },
  'mailings':{
    'x1':356,
    'y1':30,
    'x2':430,
    'y2':52,
    'tab':'view'
  },
  'review':{
    'x1':430,
    'y1':30,
    'x2':492,
    'y2':52,
    'tab':'view'
  },
  'view':{
    'x1':492,
    'y1':30,
    'x2':585,
    'y2':52,
    'tab':'view'
  }
} 

// randomize the sets
Q.sequence = shuffle(['Commandmap','Ribbon']);
Q.current_sequence = Q.sequence[0];
// start with practice mode
Q.practice = true;

Q.init = function(how_many, need_switch) {

  var icons = new Array(how_many);
  var valid = false;

  while(!valid) {

    //console.log('shuffling..');

    for (var i=0; i<icons.length; i++) {

      var valid = false;
      while (!valid) {

        // re-assign a random icon
        icons[i] = Q.r();

        // check if we have duplicates
        valid = (i==0 || (icons[i-1] != icons[i]));

        if (!valid) {
          //console.log('fixing invalid repeated icon: ', icons[i-1], icons[i]);
        }

      } 

    }

    if (need_switch) {

      var switches = 0;

      // check if the 50% tab switch criteria is met
      for (var i=1; i<icons.length; i++) {

        if (Q.Ribbon_icons_catalog[icons[i-1]]['tab'] != Q.Ribbon_icons_catalog[icons[i]]['tab']) {
          switches++;
        }

      } 

      //console.log('tab switch', switches);

      valid = (switches >= how_many/2);

    } else {
      valid = true;
    }

  }


  return icons;

};

Q.r = function() {

  var icons = Object.keys(Q.Ribbon_icons_catalog);
  return icons[Math.floor(Math.random()*icons.length)]

};

Q.validate = function(x,y) {

  var catalog = Q.Commandmap_icons_catalog;

  if (Q.current_sequence == 'Ribbon') {
    catalog = Q.Ribbon_icons_catalog;
  }

  var x1 = catalog[Q.current]['x1'];
  var x2 = catalog[Q.current]['x2'];
  var y1 = catalog[Q.current]['y1'];
  var y2 = catalog[Q.current]['y2'];

  return ((x <= x2 && x >= x1) && (y <= y2 && y >= y1));

};

Q.setup = function() {

  if (Q.practice)
    Q.icons = Q.init(1);
  else
    Q.icons = Q.init(2);

  Q.current_index = -1;

};

Q.init_experiment = function() {

  // create the user
  Q.user = new User();
  Q.user.load_time = 100;
  DB.store(Q.user, function(user) {
    console.log('stored user');
    Q.user = JSON.parse(user);

    $('#home').hide();
    $('#experiment').show();
    $('#bottom').hide();

    Q.init_question();

  });

};

Q.init_question = function() {

  $('#overlay').hide();

  Q.current_index++;

  // check if we are at the end of the current section
  if (Q.current_index >= Q.icons.length) {

    // here we can put a hint
    console.log('END OF SESSION');
  
    Q.next_section();

    return;
  }

  Q.current = Q.icons[Q.current_index];

  // update div
  $('#label').html(Q.current);
  $('#icon')[0].src = 'gfx/'+Q.current;
  
  if(Q.current_sequence=='Ribbon')
    $('canvas').css({'background':"url(gfx/ribbon_main.png)"});
  else
    $('canvas').css({'background':"url(gfx/commandmap.png)"});

  $('#next').hide();

  // reset all clicks
  I.clicks = [];
  I.stored = [];

  $('#progress').html(Q.current_index+1+'/'+Q.icons.length);

  console.log('MODE:', Q.current_sequence, 'PRACTICE MODE:', Q.practice, 'QUESTION:', Q.current_index+1, '/', Q.icons.length);

  // start timing
  Q.time_start = Date.now();

}

Q.next_section = function() {

  // check if we just completed a real trial session
  if (!Q.practice) {

    // check if we are all done
    if (Q.current_sequence == Q.sequence[1]) {

      Q.show_questionaire();

    }

    // switch to the next sequence entry
    Q.current_sequence = Q.sequence[1];

  }

  // switch to/from practice mode
  Q.practice = !Q.practice;

  // re-setup
  Q.setup();

  // and start the question
  Q.init_question();

}

Q.show_questionaire = function() {
  $('#experiment').hide();
  $('#questionnaire').show();
}

Q.submit = function() {

  // here we update the user in the database with the selected values of the questionaire
  test_user.device = 'touchpad';
  test_user.preference = 'commandmap';
  test_user.comments = 'wow!!!';
  test_user.state = '100';

  DB.store(test_user, function(user) {
    user = JSON.parse(user);
    console.log('updated user', user.id);

  });

}