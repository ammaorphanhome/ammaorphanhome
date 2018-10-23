<?php
require "path.php";
session_start();
if(empty($_SESSION['authenticate']))
{
	session_destroy();
	header('location: '.URL);
}