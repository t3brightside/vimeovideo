function returnFieldJS(value) {
    value = value.replace(/[-|_|,|.|–|']+/g, ':');
    value = value.replace(/[^\d:]+/g, '');
    value = value.replace(/^:|:$/g, '');
    var p = value.split(':'),
      s = 0,
      m = 1;
    while (p.length > 0) {
      s += m * parseInt(p.pop(), 10);
      m *= 60;
    }
    if (s > 0) {
      var date = new Date(0);
      date.setSeconds(s);
      value = date.toISOString().substr(11, 8);
      return value;
    } else {
      return '';
    }
  }