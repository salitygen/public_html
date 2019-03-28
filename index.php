<?php
define('EXEC',1);
// The order of connection is important!
include 'config/config.php';
include 'config/pdo.php';
include 'api/controller.php';

// Site template connection
include 'site/index.php';

// Admin panel template connection
include 'panel/index.php';

?>