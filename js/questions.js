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
    'x1':280,
    'y1':75,
    'x2':310,
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
    'x1':280,
    'y1':75,
    'x2':310,
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

// randomize the sets
Q.sequence = shuffle(['Commandmap','Ribbon']);

Q.init = function(how_many, need_switch) {

  var icons = new Array(how_many);
  var valid = false;

  while(!valid) {

    console.log('shuffling..');

    for (var i=0; i<icons.length; i++) {

      icons[i] = Q.r();

    }

    if (need_switch) {

      var switches = 0;

      // check if the 50% tab switch criteria is met
      for (var i=1; i<icons.length; i++) {

        if (Q.Ribbon_icons_catalog[icons[i-1]]['tab'] != Q.Ribbon_icons_catalog[icons[i]]['tab']) {
          switches++;
        }

      } 

      console.log('tab switch', switches);

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

  var x1 = Q.Commandmap_icons_catalog[Q.current]['x1'];
  var x2 = Q.Commandmap_icons_catalog[Q.current]['x2'];
  var y1 = Q.Commandmap_icons_catalog[Q.current]['y1'];
  var y2 = Q.Commandmap_icons_catalog[Q.current]['y2'];

  return ((x <= x2 && x >= x1) && (y <= y2 && y >= y1));

};

Q.setup = function() {

  icons = Q.init(5);

  Q.current = icons[0];

  // update div
  $('#label').html(Q.current);
  $('#icon')[0].src = 'gfx/'+Q.current;

};