<?php
include_once ('/home1/usarugb1/public_html/competition/include.php');

//verify we can edit.  1 is usarugby only.  Redirect if not?
if(editCheck(1)){

echo "<h1>Admin Options</h2>";

echo "<a href='/competition/db_update.php'>Update Player Database</a><br/>";
echo "<a href='/competition/db_update_team.php'>Add Club to Club Database</a><br/>";
echo "<a href='/competition/users.php'>User Management</a><br/>";

}

include_once ('/home1/usarugb1/public_html/competition/footer.php');

?>