<?php
      session_start();
      include("db_con.php"); 
      $_SESSION["username"]=$_POST["username"]; 
      $_SESSION["password"]=$_POST["password"];
      if($_POST["username"] != "" && $_POST["password"]!= ""){ 
      $query = mysql_query("SELECT * FROM Utente WHERE username='".$_POST["username"]."' AND password ='".$_POST["password"]."'")  
      or DIE('query non riuscita'.mysql_error());
      if(mysql_num_rows($query)){       
      $row = mysql_fetch_assoc($query); 
      header("location:gestione.html");
      }else{
            echo "<h1>Login fallito </h1><br/>"; 
            $link_address="index.php";
            echo "<a href=$link_address>
                         Ritorna alla homepage
                  </a>";
      }
      }else {
             echo "<h1>Login fallito </h1><br/>"; 
                     $link_address="index.php";
             echo "<a href=$link_address>
                         Ritorna alla homepage
                  </a>";
            
      }

?>

<?php
		mysql_close($conn);
?>