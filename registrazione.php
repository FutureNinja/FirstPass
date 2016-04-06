<html>
<head><title>Registrazione</title></head>
	<body>
<?php
session_start(); 
include("db_con.php"); 
if($_POST["username_reg"] != "" && $_POST["password_reg"]!= ""){  
$usr=$_POST["username_reg"];
$psw=$_POST["password_reg"];
$queryricerca="SELECT * FROM Utente WHERE Username='$usr'";
	$ricerca=mysql_query($queryricerca,$conn) or die("Query fallita".mysql_error($conn));
	if(mysql_num_rows($ricerca)){ 
		header('location:index.php?action=registration&errore=Nome utente gia presente');
	} else {
		$query="INSERT INTO Utente VALUES ('$usr','$psw')";
		$query_registrazione = mysql_query($query,$conn) 
		or die ("query di registrazione non riuscita".mysql_error($conn)); 
		header("location:index.php");
	}
	}else{
	header('location:index.php?action=registration&errore=Non hai compilato tutti i campi obbligatori');
}
?>

<?php
		mysql_close($conn);
?>
	</body>
</html>