<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  border: 2px solid #333300;
}

td, th {
  text-align: left;
  padding: 8px;
  border: 2px solid #333300;
}

tr:nth-child(even) {
  background-color: #ffdab3;
}
</style>
<meta http-equiv="refresh" content="30">
</head>
<body>

<table>
  <tr>
    <th>PH</th>
    <th>Turbidity</th>
    <th>Temperature</th>
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

$sql = "SELECT * FROM quality ORDER BY id DESC LIMIT 0,1";			
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
		//$date=$row["curtime"];
		//$new = date('h:i A', strtotime($date));
    	echo "<tr><td>" . $row["ph"]. "</td><td>" . $row["turbidity"]."  <b>NTU</b></td><td>" . $row["temperature"]."<b> °C</b></td></tr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 
</table>
</body>
</html>