<html>
<body>

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

echo ("MySQL - PHP Connect Test <br/>");
$hostname = "localhost";
$username = "cs20111683";
$password = "dbpass";
$dbname = "db20111683";

$connect = mysql_connect($hostname, $username, $password)
	         or die("DB Connection Failed");
			          if($connect) {
						                echo("MySQL Server Connect Success!");
										         }
else {
	echo("MySQL Server Connect Failed!");
}
?> 
<table width = "800" border = "1" cellpadding = "10">
<tr align = "center">
<td bgcolor = "#cccccc">Name</td>
<td bgcolor = "#cccccc">Score</td>
<td bgcolor = "#cccccc">Rank</td>

<?php
$name = $score = $grade = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = test_input($_POST["name"]);
	$score = test_input($_POST["score"]);

	mysql_select_db("db20111683",$connect);
	$sql = "insert into project(name, score) values ('$name', '$score')";
	mysql_query($sql);
	$sql1 = "select name, score , (select count(*)+1 from project where score > t.score) as rank from project as t order by rank asc";
	$result = mysql_query($sql1);
	if (!$result) { 
		die('Invalid query: ' . mysql_error());
	}
	while($row = mysql_fetch_array($result))
	{
		echo " <tr>
			<td> $row[name] </td>
			<td> $row[score] </td>
			<td> $row[rank] </td>
			</tr>
			";
	}

}


function test_input($data) {

	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
mysql_close($connect);
?>

</body>
</html>

