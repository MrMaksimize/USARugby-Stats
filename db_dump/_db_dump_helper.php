<?php
// Simple script to process a db dump for archival.
include_once ('/home1/usarugb1/public_html/competition/db.php');

$dbhost   = "localhost";
$dbuser   = $username;
$dbpwd    = $password;
$dbname   = $database;
$dumpfile = $dbname . "_" . date("Y-m-d_H-i-s") . ".sql";

passthru("`which mysqldump` --opt --host=$dbhost --user=$dbuser --password=$dbpwd $dbname > $dumpfile");

// report - disable with // if not needed
// must look like "-- Dump completed on ..." 

echo "$dumpfile "; passthru("tail -1 $dumpfile");

?>
