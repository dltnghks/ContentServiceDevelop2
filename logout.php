<?php
session_start();
$_SESSION['id'] = NULL;
$_SESSION['password'] = NULL;
echo "<script>alert('로그아웃');</script>";
echo "<script>location.replace('pyony.php')</script>";
exit();
?>
