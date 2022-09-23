

<?php
session_start();
if(!isset($_SESSION["ifsc"])){
header("Location: login.php");
exit(); }
?>
