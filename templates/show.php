<?php require_once '../model1.php'; ?>
 
<?php $post = getPostById($_GET['id']); ?>
 

<small class="commentmetadata"><a href="#comment-1" title=""><?php echo $post['insertdate'] ?></a>  

			
   
   <p><?php echo $post['usuario'] ?></p>

	<br />
	   <p><?php echo $post['comentario'] ?></p><br><br>

<h1></h1>
   <br>
   <div>
   </div>
   <div>
   <br>
    <a href="show.php?id=<?php echo $_GET['id'] ?>"></a>
   <br>
   <br>
    <a href="../">Return to main page</a>
   </div>
  
				

		</li>

	
	
	</ol>


 <body>
  </body>
</html>