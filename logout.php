<?php
 session_start ();
 unset($_SESSION["username"]);
 unset($_SESSION["password"]);
 session_destroy();
?>

<html>
<head><title>logout</title></head>
	<body>
	<?php
		header("location:index.php");
	?>
	</body>
</html>