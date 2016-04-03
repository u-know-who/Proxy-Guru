<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user'])!="")
{
    header("Location: login.php");
}
$request_id = $_GET['request_id'];
$sqlr1  = mysql_query("UPDATE request SET  request_no = request_no + 1 WHERE request_id = ".$request_id);
$sqlr2  = mysql_query("UPDATE request SET  request_users = CONCAT(request_users,' ',".$_SESSION['user'].") WHERE request_id = ".$request_id);
?>
