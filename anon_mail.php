<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user'])!="")
{
	header("Location: index.php");
}

$request_id = $_GET['request_id'];
$accept_id = $_GET['user_id'];

$res=mysql_query("SELECT * FROM request WHERE request_id=".$request_id);


$userRow=mysql_fetch_array($res);
$user_id=$userRow['user_id'];
$teacher=$userRow['teacher'];

$query=mysql_query("SELECT * from users where user_id = ".$user_id);
$row=mysql_fetch_array($query);

$aquery=mysql_query("SELECT * from users where user_id = ".$accept_id);
$arow=mysql_fetch_array($aquery);

$first_name=$row['first_name'];
$last_name=$row['last_name'];
$to="shubhamapadia@gmail.com";

$subject="Proxy Confirmation From Proxy Guru";
$body="You have to attend in proxy of ".$teacher." for ".$first_name." ".$last_name;
$headers="From: proxyguru@proxyguru.com";
if(mail($to, $subject, $body,$headers))
{
	header("Location: afterlogin.php");
}
else
{
	?>
	<script>alert('error while sending mail');</script>
	<?php
}
?>
