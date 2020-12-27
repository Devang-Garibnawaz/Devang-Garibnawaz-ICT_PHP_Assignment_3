<?php 
	// specifying directory 
	$mydir = 'D:/'; 
  
	//scanning files in a given diretory in ascending order 
	$myfiles = scandir($mydir); 
?>

<html>
<head></head>
<body>
	<table border="2">
		<tr>
			<th>Name</th>
		<tr>
		<? for($x =0;$x < sizeof($myfiles) - 1;$x++){ ?>
				<tr>
					<td><? echo $myfiles[$x] ?></td>
				</tr>
		<?}?>
	</table>
</body>

</html>