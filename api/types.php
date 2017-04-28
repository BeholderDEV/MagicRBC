<?php
// Connecting, selecting database
$dbconn = pg_connect("host=ec2-23-21-220-188.compute-1.amazonaws.com port=5432 dbname=dctik1bjnhg0cq user=eqmabwrwaxuqaw password=a957bffb046d116cdfba8ca15b59011110ad6009865f822b7b1116032799ef79 sslmode=require")
              or die('Could not connect: ' . pg_last_error());


$query = "select * from type;";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
$resultArray = pg_fetch_all($result);

echo json_encode($resultArray[0]);
?>
