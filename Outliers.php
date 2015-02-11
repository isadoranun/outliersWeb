<!DOCTYPE html />

<?php
$cookie_name = "pavlos6";
?>

<html>

  <head>


    <title>This is the title of my website</title>
     <LINK href="isadora2.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="/webfonts.css" media="screen" />

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
<li><a href="./Downloads.php">Downloads</a></li>

</ul>
</div>
</div>

<?php
$cookie_name='pavlos6';


?>
<?php if(!isset($_COOKIE[$cookie_name])):?>
  <div class="custom">

<br><br>
<!-- <input type='text' name='Redirect' class='warning' value='Please login first.'> -->
  
 <center><i>  Please login first.</i></center>


<br><br>

 <center><img src="smarter.png" alt=""  width='242'/></center>

<br><br>
 <center><i>  You are being redirected.</i></center>

 <br><br>

<div class="footer">
<p><strong>Isadora Nun</strong> isadoranun@seas.harvard.edu  & <strong>Pavlos Protopapas</strong> pavlos@seas.harvard.edu</p></div>


</div>

<?php header('Refresh: 3; url=./Home.php'); ?>


<?php endif; ?>
</div>

<?php if(isset($_COOKIE[$cookie_name])): ?>


<?php

foreach ($_POST as $name => $content) {

  $user = $name;
  echo "BLA";
  echo $user;
  echo $_POST['blah2'];
}


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>


<?php
echo $Name;
echo "<br>";
echo $email;

?>
 <br><br>



<table style="width:100%" border="0" cellspacing="10" >



    <?php
    $num_col=3;
    $ctr=0;
    $filelist = glob("*.pdf", GLOB_NOSORT );


     foreach($filelist as $curimg){
        echo "<td style='background-color:white'>";

        $where1 = strrpos($curimg, '_');
        $where1 = $where1 + 1;
        
        $id = substr($curimg,$where1, -4);

        #echo "<input onmouseover=\"this.src='click.png'\" onmouseout=\"this.src='$curimg'\"  type='image' src='$curimg' name='$curimg' class='entry' id='$curimg' alt='$curimg' width='342'/> ";

        echo '<a class="entry small pos_ centerText" href="indiv.php?name='.$curimg.'">';

        echo "<img src='$curimg' name='$curimg' class='entry' id='$curimg' alt='$curimg' width='342'/> <span class='hover'><span class='text'><span >About this outlier</span><br /></span></span>
        </a>";


        $ctr = $ctr+1;
        
        if ($ctr % $num_col==0) {
          echo "<tr/>";
        }
   }


    ?> 


</table>  



<right><div class="circleBase type6"><i>Logged as<br>
<?php echo $_COOKIE[$cookie_name]; ?><br>
</div></right>

  </body>

<div class="footer">
<p><strong>Isadora Nun</strong> isadoranun@seas.harvard.edu  & <strong>Pavlos Protopapas</strong> pavlos@seas.harvard.edu</p></div>


<?php endif; ?>

</html>

