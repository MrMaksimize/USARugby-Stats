<?php
include_once ('/home1/usarugb1/public_html/competition/include.php'); 

echo "<h1>Welcome to USA Rugby's National Championship Series!</h1>";

if (editCheck(1))
{
echo "<a href='/competition/add_comp.php'>Add New Competition</a><br/>\r";
}

//List our comps
echo "<h2>Competitions</h2>";
echo "<div id='comps'>";
include_once ('/home1/usarugb1/public_html/competition/comp_list.php');
echo "</div>";


 include_once ('/home1/usarugb1/public_html/competition/footer.php');
mysql_close();
?>