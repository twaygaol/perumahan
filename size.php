<?php

$servername = "sql208.epizy.com";
$username = "epiz_32794488";
$password = "5SQu2CZ204D";
$dbname = "epiz_32794488_db_companyprofile";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT table_schema \"db_companyprofile\",
        ROUND(SUM(data_length + index_length) / 1024 / 1024, 1) \"DB Size in MB\" 
        FROM information_schema.tables GROUP BY table_schema";
$result = $conn->query($sql);


if ($result=mysqli_query($conn,$sql)){
	
	//fetch one and one row
	while($row=mysqli_fetch_row($result)){
		printf("%s (%s) MB <br />\n",$row[0],$row[1]);

	}
    //free result set
    mysqli_free_result($result);
}

$conn->close();

?>
