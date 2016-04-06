<html>
<head><title>Modifica Password</title></head>
	<body>
<?php
session_start();
include("db_con.php");

if($_POST["nome"] != "" && $_POST["username"]!= "" && $_POST["username"] != "" && $_POST["password"] != ""){
	$name=$_POST["nome"];
	$usr=$_POST["username"];
	$psw=$_POST["password"];
	$ut=$_SESSION["username"];
	$queryricerca="SELECT * FROM Password WHERE Nome='$name' AND Nomeutente='$usr'AND password='$psw' AND UtentePropr='$ut' ";
	$ricerca=mysql_query($queryricerca,$conn) or die("Query fallita".mysql_error($conn));
	if(mysql_num_rows($ricerca)){ 
		header('location:pass.php?action=insr_error&errore=la password inserita è già presente');
	} else {
		$queryupdate="UPDATE Password SET password='$psw' WHERE Nome='$name' AND Nomeutente='$usr' AND UtentePropr='$ut' ";
		$update=mysql_query($queryupdate,$conn) or die("Query fallita".mysql_error($conn));
		header("location:pass.php");	
	}
} else {
	header('location:pass.php?action=insr_error&errore=Alcuni parametri sono vuoti');
}
	
?>

<?php
		mysql_close($conn);
?>
	</body>
</html>