<?php
setcookie('selectdesktop', 0);
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
    html5Includes();
    ?>

  </head>
  <body ng-app="arp-seed-mobile" ng-controller="app">

    <!-- Sidebars -->
    <div ng-include="'app/templates-mobile/sidebarLeft.html'"
         class="sidebar sidebar-left" toggleable parent-active-class="sidebar-left-in" id="mainSidebar"></div>


    <div ng-include="'app/templates-mobile/sidebarRight.html'"
         class="sidebar sidebar-right" toggleable parent-active-class="sidebar-right-in" id="rightSidebar"></div>


    <div class="app">

      <!-- Navbars -->
      <div class="navbar navbar-app navbar-absolute-top">
        <div class="navbar-brand navbar-brand-center" yield-to="title">
          <span>arp-seed</span>
        </div>


        <div class="btn-group pull-left">
          <div ng-click="toggle('mainSidebar')" class="btn btn-navbar sidebar-toggle">
            <i class="fa fa-bars"></i> Menu
          </div>
        </div>


        <div class="btn-group pull-right" yield-to="navbarAction">
          <div ng-click="toggle('rightSidebar')" class="btn btn-navbar">
            Menu <i class="fa fa-external-link"></i>
          </div>
        </div>

      </div>

      <!-- bottom bar -->
      <div class="navbar navbar-app navbar-absolute-bottom">
        <div class="btn-group justified">
          <span class="btn btn-navbar">
            arp
          </span>

          <span class="btn btn-navbar">
            arp
          </span>

        </div>
      </div>

      <!-- App Body -->
      <div class="app-body" ng-class="{loading: loading}">
        <div ng-show="loading" class="app-content-loading">
          <i class="fa fa-spinner fa-spin loading-spinner"></i>
        </div>
        <ng-view class="app-content" ng-hide="loading">

        </ng-view>
      </div>

    </div><!-- ~ .app -->

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

  </body>
</html>
