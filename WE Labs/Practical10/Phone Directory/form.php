<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	$myPhoneDirectory = array("Number"=>$_GET["number"] ,"Name"=>$_GET["name"]);
	
	echo ("Number: ".$myPhoneDirectory['Number']);
	
	echo ("<br>Name: ".$myPhoneDirectory['Name']);
?>
</body>
</html>