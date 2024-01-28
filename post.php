<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post Your Pet | Pet Adoption Website</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Find a loving home for your furry friend</h1>
  </header>

  <main>
    <section class="post-form">
      <?php if (count($errors) > 0) : ?>
        <div class="error-message">
          <?php foreach ($errors as $error) : ?>
            <p><?php echo $error; ?></p>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

     
      <form action="post.php" method="post" enctype="multipart/form-data">
        <label for="pet_name">Pet Name:</label>
        <input type="text" name="pet_name" id="pet_name" value="<?php echo $pet_name; ?>">
        <label for="species">Species:</label>
        <select name="species" id="species">
          <option value="">Choose...</option>
          <option value="dog" <?php if ($species == 'dog') echo 'selected'; ?>>Dog</option>
          <option value="cat" <?php if ($species == 'cat') echo 'selected'; ?>>Cat</option>
          <option value="other">Other</option>
        </select>
        <label for="breed">Breed (optional):</label>
        <input type="text" name="breed" id="breed" value="<?php echo $breed; ?>">

        <label for="age">Age:</label>
        <select name="age" id="age">
          <option value="">Choose...</option>
          <option value="puppy/kitten">Puppy/Kitten (0-1 year)</option>
          <option value="young">Young (2-5 years)</option>
          <option value="adult">Adult (6-10 years)</option>
          <option value="senior">Senior (10+ years)</option>
        </select>

        <label for="description">Description:</label>
        <textarea name="description" id="description"><?php echo $description; ?></textarea>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image">
        <button type="submit" name="post_pet">Post Pet</button>
      </form>
    </section>
  </main>

  <script src="script.js"></script>
</body>
</html>
