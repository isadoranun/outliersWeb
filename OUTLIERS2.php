<!DOCTYPE html />

<html>
  <head>
    <title>This is the title of my website</title>
     <LINK href="isadora.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <h1><center><font color="Blue"> Anomalous celestial objects catalog</font></center></h1>


<?php

$nameErr = $emailErr  = "";
$Name = $email =  $comment = "";

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


}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<div class="module">
<form class="form" method="post" action="OUTLIERS.php"> 


<p><span class="error">* required field.</span></p>

Name: <input type="text" name="Name" class="textbox" value="<?php echo $Name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   E-mail: <input type="text" class="textbox" name="email" value="<?php echo $email;?>">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
  
   <input type="submit" name="submit" value="Submit" class="button"> 

</form>
</div>

<?php
echo $Name;
echo "<br>";
echo $email;

?>


<form action="indiv.php" method="POST">

<table style="width:100%">



    <?php
    $num_col=3;
    $ctr=0;
    $filelist = glob("*.pdf", GLOB_NOSORT );


	  foreach($filelist as $curimg){
        echo "<td>";

        $where1 = strrpos($curimg, '_');
        $where1 = $where1 + 1;
        
        $id = substr($curimg,$where1, -4);

        echo "<input type='image' src='$curimg' name='$curimg' class='btTxt submit' id='$curimg' alt='$curimg' width='342'/>";

	     #	echo "<a href='$curimg' ><img src='$curimg' width='342'/> </a><br>\n";
        #echo $curimg;


        echo "</td>";
        $ctr = $ctr+1;
        
        if ($ctr % $num_col==0) {
          echo "<tr/>";
        }
	 }


  ?> 



</table>  

</form>

  </body>
</html>

