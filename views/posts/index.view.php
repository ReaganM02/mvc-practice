<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Posts</title>
  <link href="/assets/css/main.css" rel="stylesheet">
</head>
<body>
  <div>
    <a href="/post/create">Add Note</a>
  </div>
  <ul>
    <?php foreach($posts as $post): ?>
      <li>
        <a href="/post?id=<?php echo $post['id']; ?>">
          <?php echo htmlspecialchars($post['title']); ?>
        </a>
      </li>
    <?php endforeach; ?>  
  </ul>
</body>
</html>