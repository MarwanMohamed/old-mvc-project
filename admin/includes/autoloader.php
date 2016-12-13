<?php

function autoload($className) {

  $dirs = array('../models/' ,'../admin/models/', 'models/', 'admin/models' );
  $formats = array('%s.php.inc', '%s.php', '%s.class.php', 'class.%s,php');

  foreach ($dirs as $dir) {
    foreach ($formats as $format) {
      $path = $dir.sprintf($format, $className);
      if (file_exists($path)) {
        include $path;
				return;
      }
    }
  }
}

spl_autoload_register('autoload');
