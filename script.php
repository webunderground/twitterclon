<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php  
 //index.php  
 //Title - Make @ system by using Regular Expression  
 function convertHashtoLink($string)  
 {  
      $expression = "/#+([a-zA-Z0-9_]+)/";  
      $string = preg_replace($expression, '<a href="user.php?search=$1">$0</a>', $string);  
      return $string;  
 }  
 $string = "#fabian creador de este engendro<br />";  
 $string .= '#bart soy un pilluelo<br />';  
 $string .= "#myuniverso webunderground<br />";  
 //<a href="">PHP</a>  
 $string = convertHashtoLink($string);  
 echo $string;  
 ?>  