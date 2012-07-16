<?php
//if we haven't given the user a session name, send them to login.
if(!$_SESSION['user'])
{
header('Location: http://usarugby.us/competition/login.php');
}
?>