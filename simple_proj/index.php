<?php
/*
// @REQUIRE php_classes.php  -- File storing Class implementation 
//
// $db_execute -- Object (instance of Class db_operations defined in php_classes file)
// $row --- Store the information requested to the database as associative array .
//
//
//
*/
require "php_classes.php";

echo "<link rel='stylesheet' type='text/css' href='css3_class.css'/>";

//creating an object $db_execute, instance of db_operations class
$db_execute = new db_operations();
$db_execute->db_connect();


  $result = $db_execute->db_query("SELECT color_name FROM colors");
  echo "<script src='ajax.js'></script>";
  echo " <table id='data_table' width='300px'align='center'>";
  echo "<th>Color</th>";
  echo "<th>Votes</th>";
  $i=0;
	   while ($row = mysqli_fetch_array($result)) {
		   $i++;
		   echo "<tr>";
		   echo "<td><a href='#' onclick=populate_votes('".$row['color_name']."','$i')>".$row['color_name']."</a></td>";
		   echo "<td id='td".$i."'></td>";
		   echo "</tr>";
	   }
 echo "<tr id='total_row'><td><a id='total' href='#' onclick='calculate()'>Total</a></td><td id='jscript_result'></td></tr>";
         
echo " </table>";

//Catch the values from the form bellow and insert it on the database
if (isset($_POST["color"])&& isset($_POST["city"])&& isset($_POST["votes"])){
	$db_execute->db_query("INSERT INTO colors_votes.votes (City, Votes, Color) VALUES('".$_POST['city']."','".$_POST['votes']."','".$_POST['color']."')");
	$db_execute->db_query("INSERT INTO colors_votes.colors (color_name) VALUES ('".$_POST['color']."')");
	 
	}
?>
<html>
<head>
<script>
function My_embeded_JSfunction(){
	alert('HI I embedded function');
}
</script>

</head>
<body>

<!-- Form to insert new values to the database, just typing the color and set the color/city/votes values-->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <br/><br />
    Color to Insert:<input type="text" name="color" >
    City:<input type="text" name="city" >
    Votes:<input type="text" name="votes" >
    <input type="submit" style="border-style:groove"  />
  
</form>

</body>
</html>
