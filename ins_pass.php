<html>
<head><title>Inserimento Password</title></head>
	<body>
<?php
session_start();
include("db_con.php"); 
if($_POST["nome"] != "" && $_POST["username"]!= "" && $_POST["password"] != "" && $_POST["indirizzo"] != "" ){  
	$name=$_POST["nome"];
	$usr=$_POST["username"];
	$psw=$_POST["password"];
	$indr=$_POST["indirizzo"];
	$desc=$_POST["descrizione"];
	$ut=$_SESSION["username"];
	$queryricerca="SELECT * FROM Password WHERE Nome='$name' AND Nomeutente='$usr' AND UtentePropr='$ut' ";
	$queryricerca2="SELECT * FROM Password WHERE Indirizzo='$indr' AND UtentePropr='$ut' ";
	$ricerca=mysql_query($queryricerca,$conn) or die("Query fallita".mysql_error($conn));
	$ricerca2=mysql_query($queryricerca2,$conn) or die("Query fallita".mysql_error($conn));
	if(mysql_num_rows($ricerca) || mysql_num_rows($ricerca2)){ 
		header('location:pass.php?action=insr_error&errore=la password inserita è già presente');
	} else {
		$query="INSERT INTO Password VALUES ('$name','$usr','$psw','$indr','$desc','$ut')";
		$query_inspass = mysql_query($query,$conn) 
		or die ("inserimento password nel database non riuscito".mysql_error($conn));
		header("location:pass.php");		
	}
	}else{
		header('location:pass.php?action=registration&errore=Non hai compilato tutti i campi obbligatori'); 
	}
?>

<?php
		mysql_close($conn);
?>
	</body>
</html>