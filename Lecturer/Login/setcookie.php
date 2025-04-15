<?php
session_start();
setcookie('SESSION','SESSION',time()+180);
echo "<script>window.location.href='OPT1.php';</script>";
?>