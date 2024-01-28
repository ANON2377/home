<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="lognreg.css">
  <script src="beta.js"></script>
    <meta charset="UTF-8">
    <title>Registration system PHP and MySQL</title>
    
</head>
<body>
  <div class="form-container">
    <h2>Register</h2>
    <form action="register.php" method="post">
      <?php include('errors.php'); ?>
        <label for="register-name">Name</label>
        <input type="text" id="register-name" name="username" placeholder="Username" value="<?php echo $username; ?>" required>

        <label for="register-email">Email</label>
        <input type="email" id="register-email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>

        <label for="register-password">Password</label>
        <input type="password" id="register-password" name="password_1" placeholder="Password" required>

        <label for="register-confirm-password">Confirm Password</label>
        <input type="password" id="register-confirm-password" name="password_2" placeholder="Repeat Password" required>

        <input type="submit" name="reg_user" value="Register">
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</div>
<div class="botom">
  <button class="redi">
      <a class="mr1" href="index.html" target="_self" > HOME </a></li>
      <a class="mr2" href="pets.html" target="_self"> PETS</a></li>
      <a class="mr3" href="food.html" target="_self">FOOD </a></li>
      <a class="mr4" href="accessories.html" target="_self">ACCESSORIES </a></li>
      <a class="mr5" href="pet_care.html" target="_self">PET CARE  </a></li>
     <a class="mr6" href="pet_toys.html" target="_self">PET TOYS  </a></li>
      <a class="mr7" href="pet_home.html" target="_self">PET HOME</a></li>
  </button>
</div>

</body>
</html>