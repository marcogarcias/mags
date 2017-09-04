var utils={
  arrayShuffle: function(arr){
    if(!(arr instanceof Array)) return arr;
    var j, x, i;
    for (i = arr.length; i; i--) {
      j = Math.floor(Math.random() * i);
      x = arr[i - 1];
      arr[i - 1] = arr[j];
      arr[j] = x;
    }
    return arr;
  }
};