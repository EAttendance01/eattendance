<?php
session_start();
unset($_SESSION["tpid"]);
session_destroy();
header("Location: first.php");
exit;
?>
