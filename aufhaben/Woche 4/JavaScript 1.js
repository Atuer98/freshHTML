//1
//Erste aufgabe
function identity_funtion(x){
  function identity(y){
    return y;
  }
  return identity(x);
}
var x = identity_funtion(3);
//console.log(z);

//zweite

function addf(x){
  return function(y) {
    return x + y;
  }
}
var x= addf(2);
//console.log(x(3));

//Dritte

function applyf(Function){
  return function(x){
    return function(y){
      return Function(x,y);
    }
  }
}
var add=applyf(addf);
var y= add(3)(4);

//console.log(y);

//Viertes

function curry(Fnk,x){
  function do1(y){
    return Fnk(x,y);
  }
  return do1(y);
}
var add3 = curry(addf,3);
//console.log(add3(5));

//fünfte
function incS(x){
  var result = addf(x);
  return result(1);
}
function incAddf(x){
  return addf(x)(1);
}
var x = incS(256);
//console.log(x);
//console.log(incAddf(3));

//Sechste A. Methodize

function methodize(Fnk){
  return function(){
    return Fnk(this,x);
  }
}
function adde(first,secound){
  return  first+secound;
}
Number.prototype.add= methodize(add);
var x = adde(2,2);
//console.log((11).add(11)); gibt [function] zurück.

// 7 demethodize()
function demethodize(Fnk){
  return function(x,y){
    return Fnk.call(x,y);
  }
}
//console.log(demethodize(Number.prototype.add)(5,6));


//8 twice

function twice(fun) {
  return function (arg) {
    return fun(arg, arg);
  }

//9 composeu
  function composeu(fn1, fn2) {
    return function (x) {
      return fn2(fn1(x));
    }
  }


//10 composeb

  function composeb(fn1, fn2) {
    return function (x, y, z) {
      return mul(fn1(x, y), z);
    }
  }

//11 once

  function once(fun) {
    var test = true;
    if (test) {
      test = false;
      return function (arg1, arg2) {
        fun(arg1, arg2);
      }
    }
    console.log('fehler');
  }

  var once = (function (Function) {
    var executed = false;
    return function (x, y) {
      if (i) {
        return "Fehler";
      }
      executed = true;
      return Function(x, y);
    }
  })();
  var addonce = once(add1);

//12 counterf()
  var counterf = function (x) {
    return {
      inc: function () {
        return x + 1;
      },
      dec: function () {
        return x - 1;
      }
    }
  }
  var counter = counterf(10);

//13 revocable
  function revocable(func) {
    var test = true;

    function invoke(arg1) {
      if (test) {
        return func(arg1);
      }
    }

    function revoke() {
      test = false;
    }
  }
}

//14  array wrapper nicht gelöst



/*
  var revocable = function (Function) {
    var inv = true;
    return {
      invoke: function (x) {
        if (inv) {
          return Function(x);
        } else {
          return "Fehler";
        }
      },
      revoke: function () {
        inv = false;
        return "";
      }
    }
  }
  var temp = revocable(incS);
  console.log(temp.invoke(7));
  console.log(temp.invoke(8));
  console.log(temp.revoke());
  console.log(temp.invoke(9));


  function ArrayWrapper(arr) {
    var ar = arr;
    ar.elements = new Array();
    ar.size = 0;

    ar.get = function (x) {
      return ar[x];
    }
    ar.store = function (x) {
      ar.push(x);
    }
    ar.append = function (x) {
      ar.push(x);
    }
  }

  var arr = ['apple', 'banana'];
  var z = ArrayWrapper(arr);
  console.log(ArrayWrapper);
}

 */
