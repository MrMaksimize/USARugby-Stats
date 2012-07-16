<?php 
//Start session
include_once ('./session.php');

$user=$_SESSION['user'];

echo $_SESSION['warning'];
$_SESSION['warning']='';

if(!$user){
echo "<form id='getaccess' name='getaccess' method='POST' action='/competition/check.php'>\n";
echo "Login<input type='text' class='normal' name='login' />\n";
echo "Password<input type='password' name='pw' />\n";
echo "<input type='submit' name='submit' class='normal' value='Login'>\n";
echo "</form>\n";
}else{
header('Location: http://usarugby.us/competition');
}
?>