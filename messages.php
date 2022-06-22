<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Twitter Clone - Final</title>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
    />
	 <style> 
textarea {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
 border-radius: 150px;
  

}
input {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
 border-radius: 150px;
  

}

</style>
	
	
  </head>
  <body>
    <div class="post__body">
          <div class="post__header">
            <div class="post__headerText">
              <h3>
                Twitter
                <span class="post__headerSpecial"
                  ><span class="material-icons post__badge"> verified </span></span
                ><i class="fab fa-twitter"></i>
              </h3>
            </div>
            <div class="post__headerDescription">
              <p>Defender y respetar la voz del usuario.</p>
            </div>
          </div>
		  <div class="sidebar">
      <i class="fab fa-twitter"></i>
      <div class="sidebarOption active">
        <span class="material-icons"> home </span>
      <a href="index.php" style=" text-decoration: none;">   <h2>Home</h2></a>
      </div>
	   <?php echo htmlspecialchars($_SESSION["username"]); ?>
	  <div class='widgets__widgetContainer'>
	  <h1>Messages</h1>
	  
	 </div>
	 
        <form action="mail.php" method="post">
          <label>From:</laberl><br>
            <input type="text" size="20" name="usuario"  value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" />
           
		   <label>To:</label><br>
		   <input type="text" size="20" name="user" />
		   <label>Message</label><br>
		   <textarea class="comentario" name="comentario" cols="40" rows="6" aria-required="true" placeholder="What's happening?" /></textarea>
		   
		  
          </div>
          <button  type="submit" class="tweetBox__tweetButton" name="enviar">Tweet</button>
        </form>
      </div>
	  
	  
	  
	  
    <div class="widgets__widgetContainer">
	<h2>Enviados</h2><br> 
	<blockquote class="twitter-tweet">
  <?php 
  // Se conecta al SGBD 
   $myser=$_SESSION["username"]; 
  if(!($conexion = mysql_connect("localhost", "root", "password"))) 
    die("Error: No se pudo conectar");
 
  // Selecciona la base de datos 
  if(!mysql_select_db("twitter", $conexion)) 
    die("Error: No existe la base de datos");
 
  // Sentencia SQL: muestra todo el contenido de la tabla "books" 
  $sentencia = "SELECT * FROM messages WHERE `usuario` = '$myser' ORDER BY fecha DESC"; 
  // Ejecuta la sentencia SQL 
  $resultado = mysql_query($sentencia, $conexion); 
  if(!$resultado) 
    die("Error: no se pudo realizar la consulta");

 echo "";
  while($fila = mysql_fetch_assoc($resultado)) 
  { 
   echo "<div >";
 echo" </div>";
echo"<span class='material-icons'> account_circle</span> ";	  
echo "to:" . $fila['user'] . "<br> from:" . $fila['usuario'] . "<br/> <div class='tiempo'>" . $fila['fecha'] . "</div>";
    echo "<div class='comment'><p>";
    echo $fila['comentario'] . '</p><br/>';
   echo "</div>";
   echo "<hr>";
  } 
 echo "</div></div>";
  // Libera la memoria del resultado
  mysql_free_result($resultado);
  
  // Cierra la conexión con la base de datos 
  mysql_close($conexion); 
?> 
           
	</<blockquote>
