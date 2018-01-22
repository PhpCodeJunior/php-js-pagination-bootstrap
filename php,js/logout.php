<?php

include_once("head.php");



session_destroy();

echo "<div class='container'>";

echo "<div class='well'>";
    echo"<h1>YOU ARE LOGOUT,PLEASE LOGIN AGAIN <a href='login.php' class='alert alert-success'>LOGIN AGAIN</a></h1>";
echo"</div>";



echo"</div>";

include_once("footer.php");


?>