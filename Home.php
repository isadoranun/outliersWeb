<!DOCTYPE html />


<?php
$cookie_name = "pavlos6";
?>

<html>
  <head>


    <title>This is the title of my website</title>
     <LINK href="isadora2.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="webfonts.css" media="screen" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="/is/js/release/kveik.1.4.24.js?1"></script>
<script type="text/javascript" src="/is/contrib/jquery/plugins/jquery.color.min.js?1"></script>

  </head>

<div id="container">
  <body>

 

    <!--[if IE 6 ]><body class="ie ielt9 ielt8 ielt7 ie6"><![endif]-->
<!--[if IE 7 ]><body class="ie ielt9 ielt8 ie7"><![endif]-->
<!--[if IE 8 ]><body class="ie ielt9 ie8"><![endif]-->
<!--[if IE 9 ]><body class="ie ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><body><!--<![endif]-->

<div class="wrap1"><div class="wrap2"><div id="borderWrapper">


<div class="centerContent">

<div class="header fullWidth hideOverflow">
<div class="logo centerText">
<a href="./Home.php">
<img src="LOGO5.png" alt="Lars Tornøe" width= 95%/><br />
Isadora Nun & Pavlos Protopapas
</a>
</div>
<div class="topMenu medium halfWidth floatRight">
<ul>
<li><a href="./Home.php">Home</a></li>
<li><a href="./Outliers.php">Outliers</a></li>
<li><a href="./Downloads.php/">Downloads</a></li>

</ul>
</div>
</div>


<br><br>

<div class="about">
<div class="left">
<div class="_isElement" id="_isElement_img">

<center><img src="smarter.png" alt=""  width='442'/></center>
<br><br>
<br><br>
<hr width="500">
<!-- <center><img src="paragraph.png" alt=""  width='150'/></center>
 -->
</div>&nbsp;

<br><br>

<?php
$nameErr = $emailErr  = "";
$Name = $email =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["Name"])) {
     $nameErr = "Name is required";
   } else {
     $Name = test_input($_POST["Name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$Name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }

   if (!empty($_POST)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && (preg_match("/^[a-zA-Z ]*$/",$Name)) && (!isset($_COOKIE[$cookie_name]))){
      setcookie($cookie_name, $Name, time() + (86400 * 30), "/"); // 86400 = 1 day
      header('Location: Home.php');
    }
   }

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>




<?php if(!isset($_COOKIE[$cookie_name])): ?>

<div class="module">
   
<form class="form" method="POST" action='Home.php'> 


<p><span class="error">* required field.</span></p>

    Name: <input type="text" name="Name" class="textbox" value="<?php echo $Name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   E-mail: <input type="text" class="textbox" name="email" value="<?php echo $email;?>">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
  
  <?php

   echo "<input type='submit'  value='Submit' class='button'>";

   ?> 

</form>


</div>
<?php endif; ?>


<?php if(isset($_COOKIE[$cookie_name])): ?> 

    You are signed up as: <?php echo $_COOKIE[$cookie_name]; ?> 

    <form class='form' method='POST' action='logout.php'>

    <input type='submit' name='Logout'   value='Logout' class='button'>
    </form> 

  
    


<?php endif; ?>



</div>


<div class="right">
<p>Several important discoveries in astronomy  have happened serendipitously while astronomers were examining other effects. For example, William Herschel discovered Uranus on March 13 1781 (Herschel1857) while surveying bright stars and nearby faint stars. Similarly, Giuseppe Piazzi found the first asteroid, Ceres, on January 1 1801 (Serio2001) while compiling a catalog of stars positions. Equally unexpected, was the discovery of the cosmic microwave background radiation (CMB) in 1965 by Arno Penzias and Robert Wilson, while testing Bell Labs  horn antenna  (Penzias1965). </p>

<p>With the proliferation of data in astronomy and the introduction of automatic methods for classification and characterization, the keen astronomer has been progressively removed from the analysis. Anomalous objects or mechanisms that do not fit the norm are now expected to be discovered systematically: serendipity is now a machine learning task. As a consequence, the astronomer's job is not to be behind the telescope anymore,  but to be capable of selecting and making the interpretation of the increasing amount of data that technology is providing. </p>

<p>We present in this website a catalog of anomalous celestial objects. The idea is  to clarify in a collaborative way the identity of unusual, rare or unknown types of astronomical objects or phenomena (e.g. high redshift quasars, brown dwarfs, pulsars and so on). After registration, any user is free to provide  information or possible conjectures about the presented anomalies. With this input we expect to elucidate the cases where a follow up might be necessary and solve some of the misteries behind our outliers.</p>

</div>

</div>






<?php if(isset($_COOKIE[$cookie_name])): ?>  

  

    <right><div class="circleBase type6"><i>Logged as<br/>
<?php echo $_COOKIE[$cookie_name]; ?><br>

    </div></right>
    
<?php endif; ?> 

  </body>

<div class="footer">

<br><br>

<p><strong>Isadora Nun</strong> isadoranun@seas.harvard.edu  & <strong>Pavlos Protopapas</strong> pavlos@seas.harvard.edu</p></div>


</div>
</div>
</div>
</div>
</div>

</html>

