<?php
session_start();
unset($_SESSION['password']);
unset($_SESSION['login']);
unset($_SESSION['role']);
header("Location: index.php");
exit;
