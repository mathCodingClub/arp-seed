<?php

$data = json_decode(file_get_contents('html5-includes.json'), true);

$cssfun = function($file) {
  print '<link rel="stylesheet" href="' . $file . '" \>' . PHP_EOL;
};

$jsfun = function($file) {
  print '<script src="' . $file . '"></script>' . PHP_EOL;
};

foreach ($data['css'] as $pattern) {
  $files = glob($pattern);
  foreach ($files as $file){
    $cssfun($file);
  }
}

foreach ($data['js'] as $pattern) {
  $files = glob($pattern);
  foreach ($files as $file){
    $jsfun($file);
  }
}

?>
