var app = angular.module('arp-seed-mobile', [
  "ngRoute",
  "ngTouch",
  "ngStorage",
  "ngSanitize",
  "angular.filter",
  "mobile-angular-ui"
]);

app.config(function($routeProvider, $locationProvider) {
  $routeProvider.when('/', {templateUrl: "app/templates-mobile/main.html"});
});

app.run(function($rootScope) {

});


app.controller('app', function($rootScope, $location) {
  
  $rootScope.$on("$routeChangeStart", function() {
    // log which page was showed
    ga('send', 'pageview', {'page': $location.path()});
    $rootScope.loading = true;
  });

  $rootScope.$on("$routeChangeSuccess", function() {
    $rootScope.loading = false;
  });

});
