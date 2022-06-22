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
	  <div class="sidebarOption">
        <span class="material-icons"> search </span>
         <a href="search.php" style=" text-decoration: none;"> <h2>Explore</h2></a>
      </div>

    <div class="widgets__widgetContainer">
	<blockquote class="twitter-tweet">





<?php  
 //hashtag.php  
 if(isset($_GET["tag"]))  
 {  
      $tag = preg_replace("#[^a-zA-Z0-9_]#", '', $_GET["tag"]);  
      echo '<h1>' . $tag . '</h1>';  
      $connect = mysqli_connect("localhost", "root", "password", "twitter");  
      $query = "SELECT * FROM blog where blog_title LIKE '%".$tag."%' ORDER BY fecha DESC";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                echo '<p>'.$row["blog_title"].'</p>';
                			
           }  
      }  
      else  
      {  
           echo '<p>No Data Found</p>';  
      }  
 }  
 ?>  
              <?php 
  // Se conecta al SGBD 
  $user=$_SESSION["username"]; 
  if(!($conexion = mysql_connect("localhost", "root", "password"))) 
    die("Error: No se pudo conectar");
 $user=$_SESSION['username'] ;
  // Selecciona la base de datos 
  if(!mysql_select_db("twitter", $conexion)) 
    die("Error: No existe la base de datos");
 
  // Sentencia SQL: muestra todo el contenido de la tabla "books" 
  $sentencia = "SELECT * FROM blog where blog_title LIKE '%".$tag."%'"; 
  // Ejecuta la sentencia SQL 
  $resultado = mysql_query($sentencia, $conexion); 
  if(!$resultado) 
    die("Error: no se pudo realizar la consulta");

 echo "";
  while($fila = mysql_fetch_assoc($resultado)) 
  { 
   echo "<div >";
 echo"</div>";   
   
   echo"<h2>";  
     echo $fila['blog_title'] . '</h2><br/>';   
   echo "<div class='comment'><p>";
     
    echo $fila['comentario'] . '</p><br/>';
	
   echo "</div>";
  } 
 echo "</div></div>";
  // Libera la memoria del resultado
  mysql_free_result($resultado);
  
  // Cierra la conexión con la base de datos 
  mysql_close($conexion); 
?> </blockquote>
	
        </div>
      </div>
      <!-- post ends -->

        <!-- post starts -->
      <div class="post">
        <div class="post__avatar">
           <img src="<?php echo htmlspecialchars($_SESSION["username"]); ?>.jpg"  alt="Avatar"/>
        </div>

        <div class="post__body">
          <div class="post__header">
            <div class="post__headerText">
              <h3>
                <?php echo htmlspecialchars($_SESSION["username"]); ?>
                <span class="post__headerSpecial"
                  ><span class="material-icons post__badge"> verified </span>@<?php echo htmlspecialchars($_SESSION["username"]); ?></span
                >
              </h3>
            </div>
