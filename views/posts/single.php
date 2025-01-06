<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($post['title']); ?></title>
</head>
<body>
  <main>
    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
    <div class="post-content">
      <?php echo htmlspecialchars($post['content']) ?>
    </div>
    <div>
      <a href="/">Go back</a>
    </div>
  </main>
</body>
</html>