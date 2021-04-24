<?php
$servername = "localhost";
$username = "test";
$password = "1234";
$dbname = "water_monetering";

$connect = mysqli_connect($servername, $username, $password, $dbname);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST["export"]))  
{   
$t1=$_POST['time'];
$t2=$_POST['time1'];

header('Content-Type: text/csv; charset=utf-8');  
header('Content-Disposition: attachment; filename=data.csv');  
$output = fopen("php://output", "w");  
fputcsv($output, array('s_no', 'volume_in_ltrs', 'distance', 'time'));  
$query = "SELECT * FROM tank WHERE time BETWEEN '".$t1."' AND '".$t2."';";  
$result = mysqli_query($connect, $query);  
while($row = mysqli_fetch_assoc($result))  
{  
     fputcsv($output, $row);  
}  
fclose($output);  
}  
?>  