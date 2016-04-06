<?php
session_start(); 
include("db_con.php");
?>
<html>
<head><title>acquisti</title></head>
	<body>
		<h1>Elenco Acquisti!</h1>
			<a href="gestione.html">
   			    Pagina di gestione
  		    </a><br/>
			<p><a href="logout.php">
       			logout
    		</a></p><br/>
		<form method="POST" action="ins_acq.php">
		<fieldset>
			<h2>Inserisci un nuovo acquisto</h2>
			<p>Descrizione:<input id="descrizione" type="text" name="descrizione"><br /></p>
			<p>Data acquisto (gg/mm/aaaa):<input id="giorno" type="text" name="giorno"> / <input id="mese" type="text" name="mese"> / <input id="anno" type="text" name="anno"> <br /></p>
			<p>Valore:<input id="valore" type="text" name="valore"><br /></p>
			<p>Nome negozio:<input id="nomneg" type="text" name="nomneg"><br /></p>
			<p>Indirizzo web(solo per acquisti online):<input id="indirizzo" type="text" name="indirizzo"><br /></p>
			<h3>Tipologia acquisto</h3>
 		    <input type="checkbox" name="tip[]" value="Alimentari"/> Alimentari<br/><br/>
  			<input type="checkbox" name="tip[]" value="Abbigliamento"/> Abbigliamento<br/><br/>
 			<input type="checkbox" name="tip[]" value="Tecnologia"/> Tecnologia<br/><br/>
			<input type="checkbox" name="tip[]" value="Affitto"/> Affitto<br/><br/>
  			<p><input name="Inserisci" type="submit" value="Inserisci" /> <p>
		</fieldset>
		</form>	
		
		<form method="POST" action="elimina_acq.php">
		<fieldset>
			<h2>Elimina un acquisto</h2>
			<p>Descrizione:<input id="descrizione" type="text" name="descrizione"><br /></p>
			<p>Data acquisto (gg/mm/aaaa):<input id="giorno" type="text" name="giorno"> / <input id="mese" type="text" name="mese"> / <input id="anno" type="text" name="anno"> <br /></p>
			<p>Valore:<input id="valore" type="text" name="valore"><br /></p>
			<p><input name="Elimina" type="submit" value="Elimina" /> <p>
		</fieldset>
		</form>	
	
		
		
		
	<?php
		$ut=$_SESSION["username"];
		$query="SELECT Descrizione, Dataacquisto, Valore, Nomenegozio FROM Acquisto WHERE UtentePropr='$ut'";
		$acq1=mysql_query($query,$conn) or die("Query fallita".mysql_error($conn));
				
		function echo_row($row) {
			echo "<tr>";
			foreach ($row as $field)
				echo "<td>$field</td>";
			echo "</tr>";
		};
		
		echo "
		<table border=\"1\"><tr>
		<th>Descrizione</th>
		<th>Data</th>
		<th>Valore</th>
		<th>Negozio</th>
		</tr>";
		while ($row = mysql_fetch_row($acq1)) echo_row($row);
		echo "</table>";
	?>
	
	<?php
		mysql_close($conn);
	?>
	</body>
</html>