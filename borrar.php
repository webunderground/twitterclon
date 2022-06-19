<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<input type="text" size="20" name="borrar"  value="<?php echo htmlspecialchars($_SESSION["username"]);.jpg ?>" /> 
<?php
$user=$_SESSION['username'];"
If (unlink('$user')) {
  // file was successfully deleted
} else {
  // there was a problem deleting the file
}
?>