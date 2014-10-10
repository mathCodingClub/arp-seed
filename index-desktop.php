<?php
setcookie('viewas', 'desktop');
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />

    <title>arp-seed</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimal-ui" />
    <meta name="apple-mobile-web-app-status-bar-style" content="yes" />
    <meta name="description" content="arp-seed: seed for generating AngularJS-REST-PHP services" />
    <meta name="keywords" content="arp-seed mobile" />

    <?php
    require_once 'html5-includes.php';
    html5Includes('html5-includes.json', array('fonts','desktop', 'common'));
    ?>

  </head>
  <body ng-app="arp-seed-desktop" ng-controller="app">

    <!-- Top menu -->
  <mcc-top-menu></mcc-top-menu>

  <mcc-portal-title></mcc-portal-title>

  <!-- App Body -->
  <div class="app-body">
    <ng-view class="app-content">

    </ng-view>
  </div><!-- ~ .app -->

  <mcc-bottom-menu></mcc-bottom-menu>


  <!--
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
              m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    // ga('create', 'UA_TRACKER_NUMBER', 'WEBSITE');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');

  </script>
  -->

</body>
</html>
