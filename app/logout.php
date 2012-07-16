<?php
include_once ('/home1/usarugb1/public_html/competition/session.php');
$_SESSION = array(); // destroy all $_SESSION data
setcookie(session_name(), "", time() - 3600, "/");
session_destroy();
header('Location: http://usarugby.us/competition/login.php');
?>