<?php
session_start();
if (isset($_SESSION['userID'])) {
	unset($_SESSION['userID']);
	unset($_SESSION['issubscribe']);
	header("Location:signup");
}else{
	header("Location:signup");
}


?>