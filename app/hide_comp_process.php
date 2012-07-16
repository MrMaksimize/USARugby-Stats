<?
include_once ('/home1/usarugb1/public_html/competition/include_mini.php');

$id = $_POST['id'];

$query = "UPDATE `comps` SET hidden=1 WHERE id='$id'";
$result = mysql_query($query);

?> 