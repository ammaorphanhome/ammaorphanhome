<?php
require "lib/path.php";
session_start();
session_destroy();
header('location:'.URL);
?>