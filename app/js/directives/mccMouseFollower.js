/*
 * This directive allows following mouse on top of an element and to call a function,
 * to be defined in controller, with the location, element and its attributes
 *
 */

app.directive("mccMouseFollower", function() {
  return {restrict: 'A',
    scope: {method: '&moveMethod'},
    link: function(scope, element, attrs) {
      var exprHand = scope.method();
      $(element).bind('mousemove', function(e) {
        var x = e.pageX - this.offsetLeft;
        var y = e.pageY - this.offsetTop;
        exprHand(x, y, element, attrs);
      });
    }
  };
})
