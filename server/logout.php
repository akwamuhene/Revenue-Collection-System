<?php
session_start();
unset($_SESSION['id']);
session_destroy();

header("Location: https://tcsys.programx.io/login");
exit;
?>