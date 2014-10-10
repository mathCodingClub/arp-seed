var app = angular.module('arp-seed-desktop', [
  "ngRoute",
  "ngTouch",
  "ngStorage",
  "ngSanitize",
  "angular.filter",
  "ui.bootstrap"
]);

app.config(function($routeProvider, $locationProvider) {
  $routeProvider.when('/', {templateUrl: "app/templates/desktop/index.html"});
});

app.run(function($rootScope) {

});


app.controller('app', function($rootScope, $location) {

  $rootScope.$on("$routeChangeStart", function() {
    // log which page was showed
    // ga('send', 'pageview', {'page': $location.path()});
    $rootScope.loading = true;
  });

  $rootScope.$on("$routeChangeSuccess", function() {
    $rootScope.loading = false;
  });

});
