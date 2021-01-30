<?php
//log out function
session_start();
session_destroy();
header("Location: login.php");
exit;