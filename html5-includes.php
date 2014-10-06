<?php

function html5Includes($json = 'html5-includes.json') {

  $data = json_decode(file_get_contents($json), true);

  $cssfun = function($file) {
      print '<link rel="stylesheet" href="' . $file . '" \>' . PHP_EOL;
    };

  $jsfun = function($file) {
      print '<script src="' . $file . '"></script>' . PHP_EOL;
    };

  foreach ($data['css'] as $pattern) {
    if (strpos($pattern, '://') !== false) {
      $cssfun($pattern);
      continue;
    }
    $files = glob($pattern);
    foreach ($files as $file) {
      $cssfun($file);
    }
  }

  foreach ($data['js'] as $pattern) {
    if (strpos($pattern, '://') !== false) {
      $jsfun($pattern);
      continue;
    }
    $files = glob($pattern);
    foreach ($files as $file) {
      $jsfun($file);
    }
  }
}

?>
