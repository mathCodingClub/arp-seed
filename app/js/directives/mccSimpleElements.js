(function() {
  var addDirective = function(dir) {
    app.directive(dir, function() {
      return {
        restrict: "E",
        transclude: true,
        templateUrl: "app/templates/directives/" + dir + ".html",
      };
    });
  };

  var elements = ['mccPortalTitle', 'mccTopMenu', 'mccBottomMenu'];
  for (var key in elements) {
    addDirective(elements[key]);
  }
})();
