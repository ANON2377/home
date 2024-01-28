<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pet['name']; ?> | Pet Adoption Website</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Meet Your New Best Friend</h1>
  </header>

  <main>
    <section class="pet-details">
      <img src="uploads/<?php echo $pet['image']; ?>" alt="<?php echo $pet['name']; ?>">
      <div class="info">
        <h2><?php echo $pet['name']; ?></h2>
        <p><strong>Species:</strong> <?php echo ucfirst($pet['species']); ?></p>
        <p><strong>Breed:</strong> <?php echo $pet['breed'] ? ucfirst($pet['breed']) : 'N/A'; ?></p>
        <p><strong>Age:</strong> <?php echo $pet['age']; ?></p>
        <p><strong>Description:</strong></p>
        <p><?php echo nl2br($pet['description']); ?></p>
      </div>

      <?php if ($is_owner) : ?>
        <div class="owner-actions">
          <a href="edit.php?id=<?php echo $pet['id']; ?>">Edit Pet</a>
          <a href="delete.php?id=<?php echo $pet['id']; ?>" onclick="return confirm('Are you sure you want to delete this pet?');">Delete Pet</a>
        </div>
      <?php else : ?>
        <div class="contact-owner">
          <p>Interested in adopting <?php echo $pet['name']; ?>?</p>
          <a href="#">Contact <?php echo $pet['owner']; ?> (Coming soon)</a>
        </div>
      <?php endif; ?>

    </section>
  </main>

  <script src="script.js"></script>
</body>
</html>
