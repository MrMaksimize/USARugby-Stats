<?php
//Start session and get DB info and start DB connection
include_once ('/home1/usarugb1/public_html/competition/session.php');
include_once ('/home1/usarugb1/public_html/competition/db.php');

//Get login and pw entered from login screen to check in DB
$login=mysql_real_escape_string($_POST['login']);
$pw=mysql_real_escape_string($_POST['pw']);
$epw=md5($pw);

//Look for any users with our login and md5'ed password
if($login && $pw){
$query = "SELECT * FROM `users` WHERE (login='$login' AND password='$epw')";
$result = mysql_query($query);
$numrows=mysql_num_rows($result);

//if we have a user match give them a session user and let them in
if($numrows>0){

while ($row=mysql_fetch_assoc($result)){
$_SESSION['teamid']=$row['team'];
$_SESSION['access']=$row['access'];
}

$_SESSION['user']=$login;
header('Location: http://usarugby.us/competition');

}
else //if we didn't get a match send them back to login
{
$_SESSION['warning']='Incorrect username or password.  Try again.';
header('Location: http://usarugby.us/competition/login.php');
}

}
else //if the username or password was empty send them back to login
{$_SESSION['warning']="Username or Password was empty.  Try again.";
header('Location: http://usarugby.us/competition/login.php');
}
?>