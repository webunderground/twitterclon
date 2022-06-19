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
	<link rel="icon" href="images/twitter.png">
	 <style> 
textarea {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
 border-radius: 150px;
  

}
</style>

  </head>
  <body>
    <!-- sidebar starts -->
    <div class="sidebar">
      <i class="fab fa-twitter"></i>
      <div class="sidebarOption active">
        <span class="material-icons"> home </span>
        <a href="index.php" style=" text-decoration: none;"><h2>Home</h2></a>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> search </span>
         <a href="search.php" style=" text-decoration: none;"> <h2>Explore</h2></a>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> notifications_none </span>
         <a href="notifications.php" style=" text-decoration: none;"><h2>Notifications</h2</a>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> mail_outline </span>
         <a href="messages.php" style=" text-decoration: none;"><h2>Messages</h2></a>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> perm_identity </span>
        <a href="profile.php" style=" text-decoration: none;"> <h2>Profile</h2></a>
      </div>

      <div class="sidebarOption">
        <span class="material-icons"> settings </span>
        <a href="settings.php" style=" text-decoration: none;"><h2>settings</h2>
      </div>
	   <div class="sidebarOption">
        <span class="material-icons"> logout </span>
        <a href="logout.php" style=" text-decoration: none;"><h2>logout</h2></a>
      </div>
      
    </div>
    <!-- sidebar ends -->

    <!-- feed starts -->
    <div class="feed">
      <div class="feed__header">
        <h2>Home</h2>
      </div>

      <!-- tweetbox starts -->
      <div class="tweetBox">
        <form action="enviar.php" method="post">
          <div class="tweetbox__input">
            <img src="<?php echo htmlspecialchars($_SESSION["username"]); ?>.jpg"  alt="Avatar"/>
           <textarea class="comentario" name="comentario" cols="40" rows="6" aria-required="true" placeholder="What's happening?" /></textarea>
		   <input type="hidden" size="20" name="usuario"  value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" />
		  
          </div>
          <button  type="submit" class="tweetBox__tweetButton" name="enviar">Tweet</button>
        </form>
      </div>
      <!-- tweetbox ends -->
  <!-- post starts -->
      <div class="post">
        <div class="post__avatar">
           <img src="<?php echo htmlspecialchars($_SESSION["username"]); ?>.jpg"  alt="Avatar"/>
        </div>

        <div class="post__body">
          <div class="post__header">
            <div class="post__headerText">
              <h3>
			  
               
                <span class="post__headerSpecial"
                  ><span class="material-icons post__badge"> verified </span>@somanathg</span
                >
              </h3>
            </div>
            <div class="post__headerDescription">
              <p><p> <?php
date_default_timezone_set('America/Bogota');    
$DateAndTime2 = date('m-d-Y h:i:s a', time());  
echo "The current date and time  $DateAndTime2.";
?></p>
 <blockquote class="twitter-tweet">
     <h2>profile</h2><br>
              <?php 
  // Se conecta al SGBD 
  $user=$_SESSION["username"]; 
  if(!($conexion = mysql_connect("localhost", "root", "lolita1873"))) 
    die("Error: No se pudo conectar");
 $user=$_SESSION['username'] ;
  // Selecciona la base de datos 
  if(!mysql_select_db("twitter", $conexion)) 
    die("Error: No existe la base de datos");
 
  // Sentencia SQL: muestra todo el contenido de la tabla "books" 
  $sentencia = "SELECT * FROM profile WHERE `usuario` = '$user'"; 
  // Ejecuta la sentencia SQL 
  $resultado = mysql_query($sentencia, $conexion); 
  if(!$resultado) 
    die("Error: no se pudo realizar la consulta");

 echo "";
  while($fila = mysql_fetch_assoc($resultado)) 
  { 
   echo "<div >";
 echo"
      </div>";   
   echo "<a href='" . $fila['web'] . "'>web</a><br/> <div class='tiempo'>" . $fila['inserdate'] . "</div>";
  
       
   echo "<div class='comment'><p>";
    echo "<a href='user.php?tag=" . $fila['usuario'] . "'>" . $fila['usuario'] . "</a><br/> ";
    echo $fila['text'] . '</p><br/>';
	 echo $fila['email'] . '</p><br/>';
   echo "</div>";
   echo "<div class='post__footer'>
            <span class='material-icons'> repeat </span>
            <span class='material-icons'> favorite_border </span>
            <span class='material-icons'> publish </span>
         </div><hr>";
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
 <div class='widgets__widgetContainer'>
      <!-- post starts -->
     
              <?php 
  // Se conecta al SGBD 
  if(!($conexion = mysql_connect("localhost", "root", "lolita1873"))) 
    die("Error: No se pudo conectar");
 
  // Selecciona la base de datos 
  if(!mysql_select_db("twitter", $conexion)) 
    die("Error: No existe la base de datos");
 $user=$_SESSION['username'] ;
  // Sentencia SQL: muestra todo el contenido de la tabla "books" 
  $sentencia = " SELECT * FROM `comentarios` WHERE `usuario` = '$user'"; 
  // Ejecuta la sentencia SQL 
  $resultado = mysql_query($sentencia, $conexion); 
  if(!$resultado) 
    die("Error: no se pudo realizar la consulta");

 echo "";
  while($fila = mysql_fetch_assoc($resultado)) 
  { 
   echo "<div >";
 echo"
      </div>";   
   echo "<a href='" . $fila['website'] . "@'>" . $fila['usuario'] . "</a><br/> <div class='tiempo'>" . $fila['fecha'] . "</div>";
  
       
   echo "<div class='comment'><p>";
     echo $fila['comentario'] . '</p><br/>';
    echo $fila['comentario'] . '</p><br/>';
   echo "</div>";
   echo "<div class='post__footer'>
            <span class='material-icons'> repeat </span>
            <span class='material-icons'> favorite_border </span>
            <span class='material-icons'> publish </span>
         </div><hr>";
  } 
 echo "</div></div>";
  // Libera la memoria del resultado
  mysql_free_result($resultado);
  
  // Cierra la conexión con la base de datos 
  mysql_close($conexion); 
?> 
           
 </div>
          </div>
          
          <div class="post__footer">
		 
            <span class="material-icons"> repeat </span>
            <span class="material-icons"> favorite_border </span>
            <span class="material-icons"> publish </span>
         </div>
        </div>
      </div>
      <!-- post ends -->
	  
     
    <!-- feed ends -->

    <!-- widgets starts -->
    <div class="widgets">
      <div class="widgets__input">
        <span class="material-icons widgets__searchIcon"> search </span>
         <form action="user.php" method="get">
		<input type="text" name="tag" placeholder="Search Twitter" />
		<input type="submit" value="Buscar">
		</form>
      </div>

      <div class="widgets__widgetContainer">
        <h2>What's happening?</h2>
        <blockquote class="twitter-tweet">
          <p lang="en" dir="ltr">
            Sunsets don&#39;t get much better than this one over
            <a href="https://twitter.com/GrandTetonNPS?ref_src=twsrc%5Etfw">@GrandTetonNPS</a>.
            <a href="https://twitter.com/hashtag/nature?src=hash&amp;ref_src=twsrc%5Etfw"
              >#nature</a
            >
            <a href="https://twitter.com/hashtag/sunset?src=hash&amp;ref_src=twsrc%5Etfw"
              >#sunset</a
            >
            <a href="http://t.co/YuKy2rcjyU">pic.twitter.com/YuKy2rcjyU</a>
          </p>
          &mdash; US Department of the Interior (@Interior)
          <a href="https://twitter.com/Interior/status/463440424141459456?ref_src=twsrc%5Etfw"
            >May 5, 2014</a
          >
        </blockquote>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      
	  	  <a class="twitter-timeline" href="https://twitter.com/robotsoftware?ref_src=twsrc%5Etfw">Tweets by robotsoftware</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

	  
	  </div>
    </div>
    <!-- widgets ends -->
  </body>
</html>
