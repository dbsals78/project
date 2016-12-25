<html>
<body>

<?php

$score = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	        $score = test_input($_POST["send"]);
}


function test_input($data) {
	    $data = trim($data);
		    $data = stripslashes($data);
			    $data = htmlspecialchars($data);
				    return $data;
}
?>


<form method="POST" ACTION="http://cspro.sogang.ac.kr/~cse20111683/DB_insert.php">
<font size = "30">Register Your ID </font> <br><br>
<input type = "text" name = "name" value = "" size = "100" style="height:80px;">
<input type = "hidden" name = "score" value = "<?php echo $score;?>">

</body>
</html>

