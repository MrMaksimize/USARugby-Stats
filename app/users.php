<?php
include_once ('/home1/usarugb1/public_html/competition/include.php');

echo "<h1>User Management</h1>\n";

echo "<h2>Current Users</h2>";
echo "<div id='users'>";
include_once ('/home1/usarugb1/public_html/competition/users_list.php');
echo "</div>";

echo "<h1>Add a User</h1>\n";
echo "<div id='useradd'>";
include_once ('/home1/usarugb1/public_html/competition/add_user.php');
echo "</div>";

include_once ('/home1/usarugb1/public_html/competition/footer.php');
?>