<?php
session_start();

// Initialize variables
$username = "";
$email = "";
$errors = [];

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

// Register user
if (isset($_POST['reg_user'])) {
  // Receive all input values
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // Form validation
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Invalid email format");
  }
  if (empty($password_1)) {
    array_push($errors, "Password is required");
  } else if (strlen($password_1) < 8) {
    array_push($errors, "Password must be at least 8 characters long");
  } else if ($password_1 !== $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  // Check for existing user
  if (count($errors) == 0) {
    $user_check_query = "SELECT * FROM users WHERE username=? OR email=?";
    $stmt = mysqli_prepare($db, $user_check_query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
      if ($user['username'] === $username) { // Add closing parenthesis here
        array_push($errors, "Username already exists");
      }
      // ... other code ...
    }
      if ($user['email'] === $email) {
        array_push($errors, "Email already exists");
      }
    }

    // Register user if no errors
    if (count($errors) == 0) {
      $password = password_hash($password_1, PASSWORD_BCRYPT);
      $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
      $stmt = mysqli_prepare($db, $query);
      mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
      mysqli_stmt_execute($stmt);

      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.html');
      exit;
    }
  }


// Login user
if (isset($_POST['login_user'])) {
  $password = mysqli_real_escape_string($db, $_password['password']);
$_password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  // Validate user if no errors
  if (count($errors) == 0) {
    $query = "SELECT * FROM users WHERE username=?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
      $user = mysqli_fetch_assoc($result);
      if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.html');
        exit;
      } else {
        array_push($errors, "Wrong password");
      }
    } else {
      array_push($errors, "Username not found");
    }
  }}