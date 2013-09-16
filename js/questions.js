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

Q.init = function(how_many) {

  var icons = new Array(how_many);

  for (var i=0; i<icons.length; i++) {

    icons[i] = Q.r();

  }

  return icons;

}

Q.r = function() {

  var icons = Object.keys(Q.Ribbon_icons_catalog);
  return icons[Math.floor(Math.random()*icons.length)]

}

