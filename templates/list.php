<html>
    <body>
  <h3>List of Posts</h3>
  <ul>
   <?php foreach ($post as $post): ?>
   <li>
    <h2>
     <a href="templates/show.php?id=<?php echo $post['id'] ?>">
      <?php echo $post['comentario'] ?>
     </a>
    <h2>
  
   </li>
   <?php endforeach; ?>
  </ul>
    </body>
</html>