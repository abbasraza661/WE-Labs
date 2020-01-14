<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

	$myfile = fopen("testfile.txt", "a");
	$number = "Number:".$_GET['number']."\n";
	fwrite($myfile, $number);
	$name = "Name: ".$_GET['name']."\n";
	fwrite($myfile, $name);
	$data=fopen("testFile.txt",'r');
	while(!feof($data))
	{
		echo (fgets($data)."<br>");
	}
	fclose($myfile);
	/*$myPhoneDirectory = array("Number"=>$_GET["number"] ,"Name"=>$_GET["name"]);
	
	echo ("Number: ".$myPhoneDirectory['Number']);
	
	echo ("<br>Name: ".$myPhoneDirectory['Name']);
	*/
?>
</body>
</html>