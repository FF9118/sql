<!--
SEED Lab: SQL Injection Education Web plateform
Author: Kailiang Ying
Email: kying@syr.edu
-->

<!--
SEED Lab: SQL Injection Education Web plateform
Enhancement Version 1
Date: 12th April 2018
Developer: Kuber Kohli

Update: Implemented the new bootsrap design. Implemented a new Navbar at the top with two menu options for Home and edit profile, with a button to
logout. The profile details fetched will be displayed using the table class of bootstrap with a dark table head theme.

NOTE: please note that the navbar items should appear only for users and the page with error login message should not have any of these items at
all. Therefore the navbar tag starts before the php tag but it end within the php script adding items as required.
-->

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="css/style_home.css" type="text/css" rel="stylesheet">

  <!-- Browser Tab title -->
  <title>SQLi Lab</title>
</head>
<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #3EA055;">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#" ><img src="seed_logo.png" style="height: 40px; width: 200px;" alt="SEEDLabs"></a>







<?php

//give your mysql connection username n password
$dbuser ='root';
$dbpass ='dees';
$dbname ="sqllab_users";
$dbhost = '10.9.0.6';


// take the variables 
if(isset($_GET['username']))
{
$name=$_GET['username'];
//logging the connection parameters to a file for analysis.


// connectivity
//mysql connections for stacked query examples.
$con1 = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
// Check connection
if (mysqli_connect_errno($con1))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
    @mysqli_select_db($con1, $dbname) or die ( "Unable to connect to the database: $dbname");
}



$sql="SELECT name,nickname,birth FROM credential WHERE name='$name' LIMIT 0,1";
/* execute multi query */
if (mysqli_multi_query($con1, $sql))
{
    
    
    /* store first result set */
    if ($result = mysqli_store_result($con1))
    {
        if($row = mysqli_fetch_row($result))
        {
        
           echo "<ul class='navbar-nav mr-auto mt-2 mt-lg-0' style='padding-left: 30px;'>";
          echo "<li class='nav-item active'>";
          
          echo "</li>";
          echo "<li class='nav-item'>";
          echo "<a class='nav-link' href='#'>Simple Information</a>";
          echo "</li>";
          echo "</ul>";
          
          echo "</div>";
          echo "</nav>";
          echo "<div class='container col-lg-4 col-lg-offset-4 text-center'>";
          echo "<br><h1><b> Information Profile </b></h1>";
          echo "<hr><br>";
          echo "<table class='table table-striped table-bordered'>";
          echo "<thead class='thead-dark'>";
          echo "<tr>";
          echo "<th scope='col'>Key</th>";
          echo "<th scope='col'>Value</th>";
          echo "</tr>";
          echo "</thead>";
          
          
                
          echo "<table class='table table-striped table-bordered'>";
          echo "<tr>";
          echo "<th scope='row'>Nickname:</th>";
          echo "<td>$row[1]</td>";
          echo "</tr>";
          echo "<tr>";
          echo "<th scope='row'>Birth:</th>";
          echo "<td>$row[2]</td>";
          echo "</tr>";
          echo "</table>";  
        }
//            mysqli_free_result($result);
    }
        /* print divider */
    if (mysqli_more_results($con1))
    {
            //printf("-----------------\n");
    }
     //while (mysqli_next_result($con1));
}
else 
    {
	echo '<font size="5" color= "#FFFF00">';
	print_r(mysqli_error($con1));
	echo "</font>";  
    }
/* close connection */
mysqli_close($con1);


}
	else { echo "Please input the ID as parameter with numeric value";}

?>



    
      <br><br>
      <div class="text-center">
        <p>
          Copyright &copy; SEED LABs
        </p>
      </div>
    </div>
  </body>
  </html>
