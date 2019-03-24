<?php
session_start();
session_destroy();
header('LOCATION: index.php?&deco=1');
exit;
?>