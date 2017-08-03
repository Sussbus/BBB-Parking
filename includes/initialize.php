<?php


defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null :
define('SITE_ROOT', DS.'Applications'.DS.'MAMP'.DS.'htdocs'.DS.'bitbybite'.DS.'bbb-parking'.DS.'BBB-Parking');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

// load connect file first
require_once(LIB_PATH.DS.'connect.php');

// load basic functions next so that everything after can use them
require_once(LIB_PATH.DS.'functions.php');

// load core objects
require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'database.php');
// load database-related classes
require_once(LIB_PATH.DS.'loginUser.php');

?>
