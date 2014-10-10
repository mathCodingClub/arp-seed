app.directive("mccRememberPosition", function($localStorage,$timeout) {
  var id = 'mccRememberPosition'; // unique id to be used by this directive only
  var pos = 0;
  return {restrict: 'A',
    link: function($scope, element, attrs) {
      if (id in $localStorage) {
        if (attrs.position in $localStorage[id]) {
          pos = $localStorage[id][attrs.position];
        }
      } else {
        $localStorage[id] = {};
      }
      $localStorage[id][attrs.position] = pos;
      $timeout(function() {
        $(element).animate({scrollTop: pos}, 100, 'swing', function() {
        });
      });
      var raw = element[0];
      element.bind('scroll', function() {
        $localStorage[id][attrs.position] = raw.scrollTop;
        $scope.$apply();
      });
    }
  };

})
