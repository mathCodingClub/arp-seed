<?php

if ($_REQUEST['viewas'] == 'desktop') {
  require_once 'index-desktop.php';
} else if ($_REQUEST['viewas'] == 'mobile') {
  require_once 'index-mobile.php';
} elseif ($_COOKIE['viewas'] == 'desktop') {
  require_once 'index-desktop.php';
} elseif ($_COOKIE['viewas'] == 'mobile') {
  require_once 'index-mobile.php';
} else {
  // determine other way
  require_once 'index-desktop.php';
}

?>
