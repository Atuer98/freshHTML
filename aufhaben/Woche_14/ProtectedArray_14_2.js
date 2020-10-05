function arrayWrapper () {
  var array ;
  return{
    get: function(position) {
      return array[position];
    },
    set: function (position, value) {
      if (myFunction(position) || myFunction(value)) {
        console.log('Evenetuel exploitation, alert batman');
        return;
      } else {
        array[position]=value;
      }
      function myFunction ( checkFunction){
        return checkFunction && {}.toString.call(checkFunction) ==='[object Function]';
      }

    },
    append: function (value) {
      if (myFunction(value)) {
        console.log('Eventuel exploitation, alert Batman!');
        return;
      } else {
        array.push(value);
      }
      function myFunction(checkFunction){
        return checkFunction && {}.toString.call(checkFunction) ==='[object Function]';
      }

    },

  }
}
