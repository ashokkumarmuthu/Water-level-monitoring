<!DOCTYPE html>
<html>
<body>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158667868-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-158667868-3');
</script>

<style>
body{
	font-family:verdana;
}
iframe{
	border:none;
	height:300px;
	width:100%;
	display:block;
	padding:0px;
	margin:0px;
}
#loc{
	position:absolute;
	visibility:visible;
	left:1030px;
	top:0px;
	margin-left:8%;
	width:1500px;
}
#bt{
	position:absolute;
	visibility:visible;
	left:10px;
	top:500px;
	width:80%;
}
#style-3{
	position:absolute;
	width:80%;
	left:200px;
	margin-top:6%;
	top:500px;
}
.btn{
  background-color:green;
  border: none;
  color:white;
  border-radius:5px;
  padding: 10px 22px;
  text-align: center;
  text-decoration: none;
  position: relative;
  font-size: 16px;
  margin: 7px 6px;
  cursor: pointer;
}
input[type=time] {
  width: 150px;
  padding: 5px 8px;
  margin: 2px 0;
  box-sizing: border-box;
  border: 2px solid #996600;
  border-radius: 4px;
}
.scrollbar
{
	margin-left: 30px;
	float: left;
	height: 300px;
	width: 65px;
	background: #F5F5F5;
	overflow-y: scroll;
	margin-bottom: 25px;
}

#style-3::-webkit-scrollbar {
  width: 5px;
}
#style-3::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
#style-3::-webkit-scrollbar-thumb {
  background: #888; 
}

#style-3::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

</style>
</head>
<center>
<h1>Water Tank Monitor</h1>
</center>
<iframe src="./volumegraph.php" style="width:80%;height:530px;" scrolling="no" >
  <p>Your browser does not support iframes.</p>
</iframe>
<div id="loc">
<iframe src="./cylindergraph.php" style="width:20%;height:500px;" scrolling="no" >
  <p>Your browser does not support iframes.</p>
</iframe>
</div>
<center>
<div id="style-3">
<iframe src="./displayvolume.php" style="width=100%;height:500px;" name="table">
  <p>Your browser does not support iframes.</p>
</iframe>
</center>
</div>
           <form method="post" action="exportcsv.php">
	   <input type="date" name="time">
	   <input type="date" name="time1">
     	   <input type="submit" name="export" class="btn" value="Export" />
           </form>
<iframe src="./quality.php" style="width:30%;padding-top:20px;height:100px;">
  <p>Your browser does not support iframes.</p>
</iframe>
<h2>Motor Status</h2>
<iframe src="./motorstate.php" >
</iframe>
</body>
</html>
