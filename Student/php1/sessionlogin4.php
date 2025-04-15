<?php
	session_start();
	session_destroy();
	header('Location:../StudentHome.html');
?>