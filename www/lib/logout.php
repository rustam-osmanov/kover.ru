<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION["password"]);
header("Localhost: ".$_SESSION["HTTP_REFERER"]);
exit;
?>