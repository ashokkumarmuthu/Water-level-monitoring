<?php
$servername = "localhost";
$username = "test";
$password = "1234";
$dbname = "water_monetering";		 

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT id FROM value ORDER BY id DESC LIMIT 1;"; 
$res= mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$ans= $row['id'];
//$st=$row['val'];
?>
<!doctype html>
<html>
<head>
 <meta charset="UTF-8">
    <title>Dynamic switchs Creation IoT</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<style>
body{
	font-family:verdana;
}
.button {
  background-color:#ef0000;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
 
  font-size: 16px;
  margin: 4px 12px;
  cursor: pointer;
}

</style>
 <script type="text/javascript">
$(document).ready(function() {
	//$( "#remove" ).click(function() {
	//$("#btn").remove();
	//});
	var l="<?php echo $ans ?>";
	var v = "ON";
<?php
for($y=1;$y<=$ans;$y++)
{
	$res= mysqli_query($conn,'SELECT val FROM value where id="'.$y.'"' );
	$row = mysqli_fetch_assoc($res);
	$st=$row['val'];
	
?>
for(i=1;i<=l;i++){
var t="<?php echo $st; ?>";
if((t.localeCompare(v))==0){
$app=$("<input type='button' id='"+i+"' class=button value='ON' style='background-color:#4CAF50'>");
$app.appendTo($("body"));
}
else{
	$app=$("<input type='button' id='"+i+"' class=button value='OFF' style='background-color:red'>");
$app.appendTo($("body"));
}
<?php
}
?>
		var clicked=true;
		$("#"+i+"").on('click', function () {
   		if(clicked){
                $(this).css('background-color', '#4CAF50');
				$(this).attr('value', 'ON');
                clicked  = false;
				
            } else {
                $(this).css('background-color', '#ef0000');
				$(this).attr('value', 'OFF');
                clicked  = true;
            }   
		});
		
		$('input[type="button"]').click(function() {
                var ans = $(this).val();
				var ds=this.id;
				
                $.ajax({
                    url: "update.php",
                    method: "POST",
                    data: {
                        val: ans,id: ds
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            });
		}
	 });
	</script>
</head>
 <body>
    <h1> On Click Insert Radio Button Value into Database</h1>
    <br/>
    <h3 id="result"></h3>
    <br/>
<script type="text/javascript">
	$(document).ready(function() {
	var k="<?php echo $ans ?>";
	$("#add").on('click', function () {
			$app=$("<input type='button' id="+k+" class=button value='ON'>");
			$app.appendTo($("body"));
			});   
	$('#add').click(function() {
            $.ajax({
            url: "create.php",
            method: "POST",
            data: {},
            success: function(data) {
            $('#result').html(data);
            }
            });
		});
          
	});
</script>
	<button id="remove" class="button">Remove Switch</button>
	<button id="add" class="button">Add Switch</button>
	<div id="container">
	
	</div>
</body>
 <?php
mysqli_close($conn);
?>
</html>