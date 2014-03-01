<?php
//Including Database credentials for DB connection 
require "php_classes.php";

//Get the variable containing the color that was clicked and sended by  "GET" method with XMLHttpRequest AJAX object from JavaScript 
$color=$_GET["q"]; 

//Connecting to the database using credentials from "dbconnection.php" code
$db_execute = new db_operations(); 
$db_execute->db_connect();

//Executing the query to mysql server
$result = $db_execute->db_query("SELECT sum(Votes) as VOTES_COLORS FROM votes WHERE Color='".$color."'");
 
//From now $row variable is an associative array with columns name as index, then we printing each value, bolding it
while ($row = mysqli_fetch_array($result)) {
	if($row['VOTES_COLORS']==NULL){
				$row['VOTES_COLORS']="0";
				echo "<b>".$row['VOTES_COLORS']."</b>"; 
				 }else echo "<b>".$row['VOTES_COLORS']."</b>"; 
       }

?>