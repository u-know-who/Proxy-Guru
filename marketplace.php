<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user'])!="")
{
    header("Location: login.php");
}
?>

<!DOCTYPE html>

<html lang="en">
  <head>
  <!--<style> #bar{ font-family: "Roboto", sans-serif;}</style>-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a modern responsive CSS framework based on Material Design by Google. ">
    <title>Profile</title>
    <!-- Favicons-->
   <link rel="icon" href="images/new.png" sizes="32x32">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!--  Android 5 Chrome Color-->
    <meta name="theme-color" content="#EE6E73">
    <!-- CSS-->
    <link href="css/prism.css" rel="stylesheet">
     <link href="css/accept.css" rel="stylesheet">
    
    <link href="css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script>
      window.liveSettings = {
        api_key: "a0b49b34b93844c38eaee15690d86413",
        picker: "bottom-right",
        detectlang: true,
        dynamic: true,
        autocollect: true
      };
    </script>
    <script src="//cdn.transifex.com/live.js"></script>
  </head>
  <body>
    <header>
      <nav class="top-nav" >
        <div class="container">
          <div class="nav-wrapper"><a href = "home.html" class="page-title">Home</a></div>
        </div>
      </nav>
      <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a></div>
      <ul id="nav-mobile" class="side-nav fixed">
        
       <!-- <a id = "bar" style="font-family: Roboto, sans-serif">-->


        <li class="bold"><a class=fo href="about.html" class="waves-effect waves-teal">About</a></li>
        <li class="bold"><a href="getting-started.html" class="waves-effect waves-teal">Getting Started</a></li>
        
        <li class="bold"><a href="http://materializecss.com/mobile.html" class="waves-effect waves-teal">Mobile</a></li>
        <li class="bold"><a href="showcase.html" class="waves-effect waves-teal">Showcase</a></li>
      </ul>

      </a>
    </header>
    <main><div class="container">
  <div class="row">

    <div class="col s12 m9 l10">

  <!-- Cards Section-->
      <div id="basic" class="section scrollspy">
        <p class="caption">Cards are a convenient means of displaying content composed of different types of objects. They’re also well-suited for presenting similar objects whose size or supported actions can vary considerably, like photos with captions of variable length.</p>
        <h2 class="header">Basic Card</h2>

        <div class="row">
          <div class="col s12 m24">
            <!-- Basic Card -->
            <div class="card blue-grey darken-1">
              <div class="card-content white-text">
                <span class="card-title">Card Title</span>
                <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
              </div>
              <div class="card-action">
                <a href="#">This is a link</a>
                <a href="#">This is a link</a>
              </div>
            </div>
          </div>

          
              <?php
session_start();
include_once 'dbconnect.php'; 
$servername = "localhost";
$username = "restles6_12345";
$password = "12345";
$dbname = "restles6_1";
$conn = new mysqli($servername, $username, $password, $dbname);
$user_id_2 = $_SESSION['user'];


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT request_id, user_id,request_users,request_no, date,teacher,treat,other,color,batch,section from request";
$sql2 = "SELECT my_requests from users where user_id = ".$user_id_2;
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
while($row2 = mysqli_fetch_array($result2))
{
$my_requests = $row2['my_requests'];
}

$x = 1;
       while($row = mysqli_fetch_array($result))
 {
 	$date = $row['date'];
 	$user_id = $row['user_id'];
 	$request_users = $row['request_users'];
 	$request_no = $row['request_no'];
 	$teacher = $row['teacher'];
 	$treat = $row['treat'];
 	$section = $row['section'];
 	$batch = $row['batch'];
 	$other = $row['other'];
 	$status = $row['color'];
 	$flag=0;
 	$apple="apple";
 	$quo = explode(" ",$request_users);
 	for($i=0;$i<2;$i++)
 	{
 	if($quo[$i] == $user_id_2)
 	 	$apple = "banana";
 	 
 	}
 	if($status==0)
 	$status = "Active";
 	else if ($status==1)
 	$status = "Completed";
 	else
 	$status = "Failed";
 	
// 	if($flag==1)
 	
 	//else
 	//$apple = "apple";

         echo'<div class="row">
        <div class="col s12 m24">
          <div class="card red darken-1">
            <div class="card-content white-text">';
            echo'<span class="card-title">'.$status.'</span>';
                         echo"<p>#". $row['request_id']." Date:".$date." || Teacher:".$teacher.$apple.$quo[0]." section: ".$section." ". $batch."</p><br>";
                         echo"<p> Treat: ". $row['treat']." Other:".$other." Requested By:".$user_id."</p>";
           echo' </div>
            <div class="card-action">
              <a id = "accept'.$x.'" onclick = "hide('.$x.')"> <button class="ctrl-standard is-reversed typ-subhed fx-sliderIn">Slide In</button></a>
              <a  id = "already'.$x.'"style = "visibility:hidden"> <button class="ctrl-standard typ-subhed fx-bubbleDown">Bubble down</button></a>
            </div>
          </div>
        </div>
      </div>';
      $x++;
      }
            

        ?>//<script type = "text/javascript">
        //alert(<?php echo $quo[1] ?>);</script>
            
    <!--  Scripts-->
    <script type = "text/javascript">
    function hide(i){
     alert(i);
    document.getElementById("accept"+i).style.visibility="hidden";
     document.getElementById("already"+i).style.visibility="visible";
    
   
    }
    </script>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script>if (!window.jQuery) { document.write('<script src="bin/jquery-2.1.1.min.js"><\/script>'); }
    </script>
    <script src="js/jquery.timeago.min.js"></script>
    <script src="js/prism.js"></script>
    <script src="jade/lunr.min.js"></script>
    <script src="jade/search.js"></script>
    <script src="bin/materialize.js"></script>
    <script src="js/init.js"></script>
    </body>
</html>