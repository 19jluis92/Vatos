<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
</head>
<body>
<h1></h1>
<?php 
	var_dump($result);
	$rows=fbsql_fetch_array($result) ;
	var_dump($rows[0]);
 ?>
</body>
</html>	