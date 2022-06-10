<?php
//Log out from the session
session_start();
session_destroy();
header("Location: home.php");

?>