
<?php
session_start();

// Redirect if user not logged in
if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit;
}

// Connect to database
$db = mysqli_connect('localhost', 'root', '', 'project');

// Check if connection was successful
if (!$db) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Get username from session
$username = $_SESSION['username'];

// Fetch user data
$user_query = "SELECT * FROM users WHERE username=?";

// Prepare statement
$user_statement = mysqli_prepare($db, $user_query);

// Bind username parameter
mysqli_stmt_bind_param($user_statement, "s", $username);

// Execute prepared statement
mysqli_stmt_execute($user_statement);

// Get user data as associative array
$user_data = mysqli_fetch_assoc(mysqli_stmt_get_result($user_statement));

// Fetch posted pets
$pets_query = "SELECT * FROM pets WHERE owner=?";

// Prepare statement
$pets_statement = mysqli_prepare($db, $pets_query);

// Bind username parameter
mysqli_stmt_bind_param($pets_statement, "s", $username);

// Execute prepared statement
mysqli_stmt_execute($pets_statement);

// Get all pet results as an array of associative arrays
$pets_data = mysqli_fetch_all(mysqli_stmt_get_result($pets_statement), MYSQLI_ASSOC);

// Close connections
mysqli_close($db);
mysqli_stmt_close($user_statement);
mysqli_stmt_close($pets_statement);

// Now you have both user and pet data available for further processing
// ...

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile | Pet Adoption Website</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Welcome, <?php echo $user_data['username']; ?>!</h1>
  </header>

  <main>
    <section class="profile-info">
      <h2>Your Details</h2>
      <ul>
        <li>Email: <?php echo $user_data['email']; ?></li>
      </ul>
      <a href="edit_profile.php">Edit Profile</a>
    </section>

    <?php if (mysqli_num_rows($pets_result) > 0) : ?>
      <section class="posted-pets">
        <h2>Your Adorable Pets</h2>
        <ul>
          <?php while ($pet = mysqli_fetch_assoc($pets_result)) : ?>
            <li>
              <a href="details.php?id=<?php echo $pet['id']; ?>">
                <img src="uploads/<?php echo $pet['image']; ?>" alt="<?php echo $pet['name']; ?>">
                <span><?php echo $pet['name']; ?></span>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
      </section>
    <?php else : ?>
      <p>You haven't posted any pets yet! Click <a href="post.php">here</a> to share your furry friends.</p>
    <?php endif; ?>

  </main>

  <script src="script.js"></script>
</body>
</html>
