<?php
session_start();
if (isset($_SESSION['adminlogged1'])) {
	unset($_SESSION['adminlogged1']);
	unset($_SESSION['adminid']);
	unset($_SESSION['adminemail']);
}

header("Location:login");
?>