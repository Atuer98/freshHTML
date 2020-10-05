//2.1
//mit hilfe von Josua Brandhofer
function fifo() {
  var _array = [];
  return {
    isEmpty : function() { return this.size() === 0; },
    enqueue : function(input) { _array.push(input); },
    dequeu : function() {
      if (!this.isEmpty()) {
        return _array.shift();
      } else {
        throw "Queue empty";
      }
    },
    front : function() {
      if(!this.isEmpty()) {
        return _array[0];
      } else {
        throw "Queue empty";
      }
    },
    size : function() { return _array.length; }
  }
}

//2.2
function ungMenge() {
  var _array = [];
  return {
    add : function(input) {
      if(!this.contains(input)) {
        _array.push(input);
      } else {
        console.log("Object " + input + " already present");
      }
    },
    clear : function() { _array.length = 0; },
    contains : function(x) {
      for (let i = 0; i < this.size(); i++) {
        if(_array[i] === x)
          return true;
      }
      return false;
    },
    isEmpty : function() { return this.size() === 0; },
    remove : function(x) {
      for(let i = 0; i < this.size(); i++) {
        if(_array[i] === x) {
          _array.splice(i, 1);
          return;
        }
      }
    },
    size : function() { return _array.length; }
  };
}
