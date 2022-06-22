
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
    <h2> <span class="material-icons"> account_circle</span> 	  <?php echo htmlspecialchars($_SESSION["username"]); ?></h2><br>

    <div class="widgets__widgetContainer">
	<blockquote class="twitter-tweet">
 <?php  
 //index.php  
 //Title - Make PHP Hashtag system by using Regular Expression  
 function convertHashtoLink($string)  
 {  
      $expression = "/#+([a-zA-Z0-9_]+)/";  
      $string = preg_replace($expression, '<a href="hashtag.php?tag=$1">$0</a>', $string);  
      return $string;  
 }  
 $string = "#PHP means Hypertext Preprocessor<br />";  
 $string .= '#mysql is a nice database<br />';  
 $string .= "#Jquery is a Javascript Library<br />";  
 //<a href="">PHP</a>  
 $string = convertHashtoLink($string);  
 echo $string;  
 ?>  
	</<blockquote>
