app.directive("mccAjaxScope", function($http) {
  return {restrict: 'A',
    scope: '@',
    link: function($scope, element, attrs) {
      $http({method: 'GET', url: attrs.url}).
              success(function(data, status, headers, config) {
        $scope.ajax = data;
      }).
              error(function(data, status, headers, config) {
        console.log('Error in ajax-scope. There\'s nothing I can do.');
      });
    }
  };

})
