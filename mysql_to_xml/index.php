<!DOCTYPE HTML>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
	$con = mysqli_connect("localhost", "root", "root","student")
			or die("Could not connect : " . mysql_error());
		//echo "Connected successfully";
		
	$result = mysqli_query($con, "SELECT * FROM tblstudent");
	$fp=fopen("input.xml","w");

		if(mysqli_num_rows($result)!=0)
		{
		$xml_str="<?xml version='1.0' encoding='ISO-8859-1' ?>";
		$xml_str.="<studets>";
		
		while ($row = mysqli_fetch_array($result)) 
		{
		$xml_str.="<student>";
		$xml_str.="<name>".$row['name']."</name>";
		$xml_str.="<classname>".$row['classname']."</classname>";
		$xml_str.="<gender>".$row['gender']."</gender>";
		$xml_str.="<marks>".$row['marks']."</marks>";
		$xml_str.="</student>";
		}
		$xml_str.="</studets>";
		}
		
	fwrite($fp,$xml_str);
	echo "Check the file! XML is created!";
	mysqli_close($con);
	?>

</body>
</html>