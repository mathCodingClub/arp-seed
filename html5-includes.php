<?php

function html5Includes($json = 'html5-includes.json', $common = array()) {

  $data = json_decode(file_get_contents($json), true);

  $cssfun = function($file) {
      print '<link rel="stylesheet" href="' . $file . '" \>' . PHP_EOL;
    };

  $jsfun = function($file) {
      print '<script src="' . $file . '"></script>' . PHP_EOL;
    };


  $cssInclude = function($data) use ($cssfun) {
      foreach ($data as $pattern) {
        if (strpos($pattern, '://') !== false) {
          $cssfun($pattern);
          continue;
        }
        $files = glob($pattern);
        foreach ($files as $file) {
          $cssfun($file);
        }
      }
    };

  $jsInclude = function($data) use ($jsfun) {
      foreach ($data as $pattern) {
        if (strpos($pattern, '://') !== false) {
          $jsfun($pattern);
          continue;
        }
        $files = glob($pattern);
        foreach ($files as $file) {
          $jsfun($file);
        }
      }
    };



// make queries
  if (array_key_exists('css', $data)) {
    $cssInclude($data['css']);
  }
  if (array_key_exists('js', $data)) {
    $jsInclude($data['js']);
  }
  foreach ($common as $key) {
    $value = $data['optional'][$key];
    if (array_key_exists('css', $value)) {
      $cssInclude($value['css']);
    }
    if (array_key_exists('js', $value)) {
      $jsInclude($value['js']);
    }
  }
}
?>
