<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user'])!="")
{
    header("Location: login.php");
}
$accept_id = $_GET['accept_id'];
$sqlr1  = mysql_query("UPDATE users SET  proxy_points=proxy_points + 10 WHERE user_id = ".$accept_id);
$sqlr3  = mysql_query("UPDATE users SET  proxy_c = proxy_c + 1 WHERE user_id = ".$accept_id);
?>

