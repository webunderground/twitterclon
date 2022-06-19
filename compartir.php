
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
th, td { border: 0px solid black; overflow: hidden; width: 20px; }

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
	                      




	<h4 class="media-heading">twitter</h4>
							<p><blockquote class="twitter-tweet" data-lang="es">
								<form name="homePageAskQuestion" method="get" action="https://twitter.com/intent/tweet?url=https%3A//youtu.be/vQkBXgjcY7A&text=" target="_blank">
              
           
           <textarea cols="25" rows="5" name="text" class="form-control"  autocomplete="off" wrap="physical" onfocus="Util.gObj('hp-chr-cnt').style.display='inline'" onkeyup="evalEntryLength(this, 110, true, '', ''); displayRemLength('charCount'); doHandleEnterKeyStroke(this.form,event);"/></textarea>
                <span id="charCount" class="charCountDown">110</span> characters left</em>
                <p align="right" style="margin-top:5px;margin-right:5px;*margin-right:0px;">
				          <button  type="submit" class="tweetBox__tweetButton" name="enviar">Tweet</button>

			   	</p>
    		</form>