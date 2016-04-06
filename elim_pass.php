<html>
<head><title>Eliminazione Password</title></head>
	<body>
<?php
session_start(); 
include("db_con.php");

if($_POST["nome"] != "" && $_POST["username"]!= "" && $_POST["username"] != ""){  
	$name=$_POST["nome"];
	$usr=$_POST["username"];
	$ut=$_SESSION["username"];
	$queryelim="DELETE FROM Password WHERE Nome='$name' AND Nomeutente='$usr' AND UtentePropr='$ut'";
	$elim=mysql_query($queryelim,$conn) or die("Query fallita".mysql_error($conn));
	if(mysql_num_rows($elim)){ 
		header("location:pass.php");
	} else {
		header('location:pass.php?action=insr_error&errore=la password da eliminare non era presente nel database');
		}
	}
	
?>

<?php
		mysql_close($conn);
?>
	</body>
</html>