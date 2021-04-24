<?php
$servername = "localhost";
$username = "test";
$password = "1234";
$dbname = "water_monetering";		 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$res= mysqli_query($conn,"SELECT volume_in_ltrs FROM tank ORDER BY s_no DESC LIMIT 0,1");
$row = mysqli_fetch_assoc($res);
$n=$row['volume_in_ltrs'];

if($n<10000)
	$q1= mysqli_query($conn,"UPDATE motor_state SET state='ON' WHERE id=1;");
if($n>34000)
	$q2= mysqli_query($conn,"UPDATE motor_state SET state='OFF' WHERE id=1;");
?>
<!DOCTYPE html>
<html>
<body>
<head>
<style>
body{
	font-family:verdana;
}
.button {
  border: none;
  color: white;
  width:100px;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<meta http-equiv="refresh" content="5">
<head>
<body>
<?php
	$res= mysqli_query($conn,"SELECT * FROM motor_state where id=1" );
	$row = mysqli_fetch_assoc($res);
	$st1=$row['state'];
	$st2="ON";
	if(strcmp($st1,$st2)==0){
		
		echo "<input type='button' class='button' value='ON' style='background-color:#29a329'> ";
	
	}
	else{
		echo "<input type='button' class='button' value='OFF' style='background-color:#8a8a5c'> ";
	}
mysqli_close($conn);
?>
</body>
</html>