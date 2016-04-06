<?php
session_start(); 
include("db_con.php");
?>
<html>
<head><title>Pass</title></head>
	<body>
		<h1>Elenco Passwords!</h1>
			<a href="gestione.html">
   			    Pagina di gestione
  		    </a><br/>
			<p><a href="logout.php">
       		logout
    	</a></p><br/>
		<form method="POST" action="ins_pass.php">
		<fieldset>
			<h2>Inserisci nuova password</h2>
			<p>Nome:<input id="nome" type="text" name="nome"><br /></p>
			<p>Nome Utente:<input id="username" type="text" name="username"><br /></p>
			<p>Password:<input id="password" type="text" name="password"><br /></p>
			<p>Indirizzo:<input id="indirizzo" type="text" name="indirizzo"><br /></p>
			<p>Descrizione:<input id="descrizione" type="text" maxlength="30" name="descrizione"><br /></p>
			<p><input name="Inserisci" type="submit" value="Inserisci" /> <p>
		</fieldset>
		</form>	
		
		<form method="POST" action="elim_pass.php">
		<fieldset>
			<h2>Elimina Password</h2>
			<p>Nome:<input id="nome" type="text" name="nome"><br /></p>
			<p>Nome Utente:<input id="username" type="text" name="username"><br /></p>
			<p><input name="Elimina" type="submit" value="Elimina" /> <p>
		</fieldset>
		</form>	
		
		<form method="POST" action="update_pass.php">
		<fieldset>
			<h2>Modifica una Password</h2>
			<p>Nome:<input id="nome" type="text" name="nome"><br /></p>
			<p>Nome Utente:<input id="username" type="text" name="username"><br /></p>
			<p>Password:<input id="password" type="text" name="password"><br /></p>
			<p><input name="Modifica" type="submit" value="Modifica" /> <p>
		</fieldset>
		</form>
		
		
		
	<?php
		$ut=$_SESSION["username"];
		$query="SELECT Nome, Nomeutente, Password, Indirizzo, Descrizione FROM Password WHERE UtentePropr='$ut'";
		$passwd=mysql_query($query,$conn) or die("Query fallita".mysql_error($conn));
		
		function echo_row($row) {
			echo "<tr>";
			foreach ($row as $field)
				echo "<td >$field</td>";
			echo "</tr>";
		};
		
		echo "
		<table border=\"1\"><tr>
		<th>Nome</th>
		<th>Nome Utente</th>
		<th>Password</th>
		<th>Indirizzo</th>
		<th>Descrizione</th>
		</tr>";
		while ($row = mysql_fetch_row($passwd)) echo_row($row);
		echo "</table>";
	?>
	

	
	<?php
		mysql_close($conn);
	?>
	</body>
</html>