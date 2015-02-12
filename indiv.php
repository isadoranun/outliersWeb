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

<?php


$image =  $_GET["name"];



$id = substr($image,'0', -4);

$id = $id . '.pdf';



$where1 = strpos($id, '_');

$numimg = substr($id, '0', $where1 );

$numimg = $numimg + 1;



#echo "<center><a href='$id' ><img src='$id' width='642'//> </a><br></center>\n"; 

?>


  <?php

echo "<center><a href='$id' ><img src='$id' width='642'> </a></center>"; 
#echo "<center><a href='$id_folded' ><img src='8_1_4055_9.pdf' bottom='0px' width='642'> </a></center>\n"; 

  ?>



<div class="_isElement" id="_isElement_img">


<div class="first column">
<span class="title centerText">Outlier</span>
<p>This outlier was obtained from the MACHO survey.</p></div>


<div class="bottom">
<a href="./Outliers.php" class="back">Back to Outliers</a>
</div>


<?php

$row = 0;
$features = array('');
$header = array('');

if (($handle = fopen("MACHO_ts.csv", "r")) !== FALSE) {
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
       $num = count($data);
       $row++;
       if ($row == '1'){
        for ($c=0; $c < $num; $c++) {
          array_push($header, $data[$c]);
        }
       unset($header[0]);
       } 
       if ($row == $numimg) {
         for ($c=0; $c < $num; $c++) {
          array_push($features, round($data[$c],3));
            # echo $data[$c] . "<br />\n";
         }
       }
   }

   fclose($handle);

}



?>

<table >

<?php
$description = array("Light-curve red band average magnitude", "Difference between the average magnitude of the red and the blue band observations", 
  "Period Lomb-Scargle", "False alarm probability of the largest periodogram value",
  "Half of the difference between the median of the maximum 5% and the median of the minimum 5% magnitudes",
  "Red band magnitude standard deviation");
  $num_col=6;
    $ctr=0;
    $ctr2=1;

    foreach ($header as $val){

        echo "<td bgcolor='#fffab9'>";
        echo "<a href='$val' alt='$description[$ctr]' class='tooltip'>
                    $val </a>";

        echo "</td>";  

        $ctr = $ctr + 1;  

      if (($ctr % $num_col==0) or ($ctr == sizeof($header))) {

        echo "<tr/>";

        for ($i = $ctr2; $i <= $ctr; ++$i){

          echo "<th  bgcolor=white>";  
          echo $features[$i];
          echo "</th>";

          $ctr2 = $ctr2 + 1;  
        }
        echo "<tr>";
      }
    }
?>

</table>  



<?php

#Stores posts in a file
#TODO:
#-Order the parameters
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $myfile = fopen("testfile.txt", "a") or die("Unable to open file!");
  #User
  fwrite($myfile, $_COOKIE[$cookie_name]." said on");
  fwrite($myfile,",");
  #Outlier id
  fwrite($myfile, $id);
  fwrite($myfile,",");
  #Comment
  fwrite($myfile, $_POST['comment']);
  fwrite($myfile,",");
  #TimeStamp
  $date_now=time();
  fwrite($myfile, date("m-d-Y", $date_now));
  fwrite($myfile," at ");
  fwrite($myfile, date("H:i", $date_now));
  fwrite($myfile,",");  
  #Star Type
  fwrite($myfile, $_POST['star_type']);  
  fwrite($myfile,"\r\n");
}

#Posts section begin
#TODO
#-If the id of the comment is different than the star don't print it
#-Let users to delete their own posts
echo '<div class="post-section">';
$file = fopen("testfile.txt", "r") or exit("Unable to open file!");
//Output a line of the file until the end is reached
while (!feof($file))
{
  $currentLine = fgets($file);
  if ($currentLine==""||$currentLine=="\r\n")
      continue;
  #Post begin 
  echo '<div class="post">';
    $currentLine=explode(",",$currentLine);
    #User
    if ($currentLine[0]!="")
      echo '<span class="user">'.$currentLine[0].'</span>';
    #Timestamp
    if ($currentLine[3]!="")
      echo '<span class="timestamp">'.$currentLine[3].'</span>';
    #id
    #if ($currentLine[1]!="")
    #echo '<span class="id">'.$currentLine[1].'</span>';
    #Star Type
    if ($currentLine[4]!="")
      echo '<div class="star-type">Possible type of star: '.$currentLine[4].'</div>';
    #Message
    if ($currentLine[2]!="")
      echo '<div class="message">'.$currentLine[2].'</div>';
  #Post end
  echo '</div>';
}
#Posts Section end
echo "</div>";
fclose($file);

function test_input($data) {

   $data = trim($data);

   $data = stripslashes($data);

   $data = htmlspecialchars($data);

   return $data;

}

?>

<br><br>

<div class="module">
<form method="post" action="indiv.php" >
Comment:
<textarea name="comment" cols="30" rows="5"></textarea>

   <br><br>

<div class='styled-select'>
   Type of star: 
  <select name="star_type">
    <option>Cepheid</option>
    <option>RRL</option>
    <option>Long Period Variable</option>
    <option>BE</option>
    <option>Eclipsing binary</option>
    <option>Quasar</option>
    <option>Nova</option>
    <option>Coronae Borealis</option>
  </select>
</div>

  
  <?php
   echo "<input  type='submit' name='$image' value='Submit' class='button'>";
   ?> 

</form>
</div>


   <br><br>

<right><div class="circleBase type6"><i>Logged as<br>
<?php echo $_COOKIE[$cookie_name]; ?><br>
</div></right>

  </body>

  <div class="footer">

<br><br>

<p><strong>Isadora Nun</strong> isadoranun@seas.harvard.edu  & <strong>Pavlos Protopapas</strong> pavlos@seas.harvard.edu</p></div>


</div>


</html>

