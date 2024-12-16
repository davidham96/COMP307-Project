<?php
// David Hamaoui, 260985825

session_start();
$_SESSION = [];
session_destroy();
header("Location: index.html");
exit;
?>
