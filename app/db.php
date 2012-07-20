<?php
$username='usarugb1_comp1';
$password='nM34@gV7';
$database='usarugb1_comp';

mysql_connect(localhost,$username,$password);  
@mysql_select_db($database) or die( "Unable to select database");
?>