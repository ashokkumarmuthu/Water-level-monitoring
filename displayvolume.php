<!DOCTYPE html>
<html>
<body>
<head>
<meta http-equiv="refresh" content="5">
<style>
table {
  font-family: arial, sans-serif;		
  border-collapse: collapse;
  text-align:center;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>  
</head>
<table align="center" style="margin-top: 10px">
<tr>
	<th>SNo</th>
	<th>Volume</th>
	<th>Distance</th>
	<th>TimeStamp</th>
</tr>
	
<?php
$servername = "localhost";
$username = "test";
$password = "1234";
$dbname = "water_monetering";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM tank ORDER BY s_no DESC LIMIT 100 ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
		$date=$row["time"];
		$new = date('h:i A', strtotime($date));
    	echo "<tr><td>" . $row["s_no"]. "</td><td>" . $row["volume_in_ltrs"] . "</td><td>". $row["distance"] . "</td><td>" .$date. "</td></tr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 
</table>
</body>
</html>