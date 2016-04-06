<html>
<head><title>Eliminazione acquisti</title></head>
	<body>
<?php
session_start(); 
include("db_con.php"); 

if($_POST["descrizione"] != "" && $_POST["valore"]!= "" && $_POST["giorno"] != "" && $_POST["mese"] != "" && $_POST["anno"] != "" ){  
	$desc=$_POST["descrizione"];
	$val=$_POST["valore"];
	$gg=$_POST["giorno"];
	$mm=$_POST["mese"];
	$aaaa=$_POST["anno"];
	$ut=$_SESSION["username"];
	$queryelim="DELETE FROM Acquisto WHERE Descrizione='$desc' AND Dataacquisto='$aaaa$mm$gg' AND Valore='$val' AND UtentePropr='$ut' ";
	$elim=mysql_query($queryelim,$conn) or die("Query fallita".mysql_error($conn));
	$queryelim2="DELETE FROM Riguarda WHERE Descrizione='$desc' AND Dataacquisto='$aaaa$mm$gg' AND Valore='$val' ";
	$elim=mysql_query($queryelim2,$conn) or die("Query fallita".mysql_error($conn));
	if(mysql_num_rows($elim)){ 
		header("location:acquisti.php");
	} else {
		header('location:acquisti.php?action=insr_error&errore=acquisto non presente nel database');
		}
}
	
?>

<?php
		mysql_close($conn);
?>
	</body>
</html>