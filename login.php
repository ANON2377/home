<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Login and Registration Form</title>
    <link rel="stylesheet" href="lognreg.css">
</head>
<body class="bod">
    <div class="form-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
        <?php include('errors.php'); ?>
        <label for="register-name">Name</label>
        <input type="text" id="register-name" name="username" placeholder="Username">

            <label for="login-password">Password</label>
            <input type="password" id="login-password" name="password" placeholder="Password">

            <input type="submit" value="Login" name="login_user">
        </form>
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
    <div class="botom">
        <button class="redi">
            <a class="mr1" href="index.html" target="_selfss" > HOME </a></li>
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
