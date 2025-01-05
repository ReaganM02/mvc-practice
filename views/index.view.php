<?php 
require_once __DIR__ . '/../functions.php';


prettyArray($posts);
?>
<ul>
  <?php foreach($posts as $post): ?>
    <li><?php echo $post['title']; ?></li>
  <?php endforeach; ?>  
</ul>