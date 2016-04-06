<html>
<head><title>Inserimento Acquisti</title></head>
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
	$neg=$_POST["nomneg"];
	$indr=$_POST["indirizzo"];
	$ut=$_SESSION["username"];
	$queryricerca="SELECT * FROM Acquisto WHERE Descrizione='$desc' AND Dataacquisto='$aaaa$mm$gg' AND Valore='$val' AND UtentePropr='$ut' ";
	$queryricerca2="SELECT * FROM Negozio WHERE Nome='$neg'"; //ricerca negozio
	$ricerca=mysql_query($queryricerca,$conn) or die("Query fallita".mysql_error($conn));
	$ricerca2=mysql_query($queryricerca2,$conn) or die("Query fallita".mysql_error($conn));
	
	if(mysql_num_rows($ricerca)){ 
		header('location:acquisti.php?action=insr_error&errore=acquisto già presente');
	} else {
		if(mysql_num_rows($ricerca2)) {
		} else {
			$query="INSERT INTO Negozio(Nome,Indirizzo) VALUES ('$neg','$indr')";
			$query_insneg = mysql_query($query,$conn)
			or die ("inserimento negozio nel database non riuscito".mysql_error($conn)); 
		}
		
		$query1="INSERT INTO Acquisto(Descrizione,Dataacquisto,Valore,Nomenegozio,UtentePropr) 
		VALUES('$desc','$aaaa$mm$gg','$val','$neg','$ut')";
		$query_insacq = mysql_query($query1,$conn)
		or die ("inserimento acquisto nel database non riuscito".mysql_error($conn)); 
		$tipologia = isset($_POST['tip']) ? $_POST['tip'] : array();
		foreach($tipologia as $tipo) {
  			$query2="INSERT INTO Riguarda(Descrizione,Dataacquisto,Valore,NomeTip) VALUES ('$desc','$aaaa$mm$gg','$val','$tipo')";
			$queryins_rig=mysql_query($query2,$conn) 
		or die ("inserimento acquisto in riguarda non riuscito".mysql_error($conn));
		}
		header("location:acquisti.php");
	}
} else {
	header("location:acquisti.php");
}
?>

<?php
		mysql_close($conn);
?>
	</body>
</html>