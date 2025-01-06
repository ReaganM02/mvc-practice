<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Post</title>
  <link href="/assets/css/main.css" rel="stylesheet">
</head>
<body>
  <main class="create-post-wrapper">
    <form method="post" class="create-post">
      <div class="field-wrapper <?php echo isset($errors['post-title']) ? 'field-error' : ''?>"">
        <label class="form-label" for="post-title">
          Title
        </label>
        <input type="text" name="post-title" id="post-title" class="form-input form-input-style" value="<?php echo $_POST['post-title'] ?? '' ?>"/>
        <div class="error-msg">
          <?php echo $errors['post-title'] ?? '' ?>
        </div>
      </div>
      <div class="field-wrapper <?php echo isset($errors['post-body']) ? 'field-error' : ''?>">
        <label for="post-body" class="form-label">Body</label>
        <textarea class="form-input-style" name="post-body" id="post-body"><?php echo $_POST['post-body'] ?? '' ?></textarea>
        <div class="error-msg">
          <?php echo $errors['post-body'] ?? '' ?>
        </div>
      </div>
      <div>
        <button type="submit" class="form-submit-btn">Submit</button>
      </div>
    </form>
  </main>
</body>
</html>