<?php
session_start();

// initializing variables
$errors = array(); 

// connect to the database
$db = new mysqli('DbLocation', 'DBuser', 'Pass', 'DbTable');

// REGISTER USER
if (isset($_POST['reg_user'])) {

  // receive all input values from the form
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];

  // form validation
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) { array_push($errors, "The passwords do not match"); }

  // first database check for user and email duplicates.
  $user_check_query = $db->prepare('SELECT * FROM users WHERE username = ? OR email = ? LIMIT 1');
  $user_check_query->bind_param("ss", $username, $email);

  if (!$user_check_query->execute()){
    array_push($errors, $db->error);
  }

  $user_check_query->store_result();

  if ($user_check_query->num_rows > 0){
    array_push($errors, "User already exists");
  } else {
    $hashed_password = password_hash($password_1, PASSWORD_DEFAULT);
    $add_user = $db->prepare("INSERT INTO users (username, email, password, rank) VALUES (?, ?, ?, 'Default')");
    $add_user->bind_param("sss", $username, $email, $hashed_password);

    if ($add_user->execute()) {
      $_SESSION['username'] = $username;
      $_SESSION['rank'] = 'Default';
      $_SESSION['success'] = "You are now logged in";
      $add_user->close();
      header('location: dashboard.php');
    } else {
      array_push($errors, $db->error);
    }
    $add_user->close();
  }

  $user_check_query->close();
  $db->close();
}
// LOGIN FLOW
else if (isset($_POST['login_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {

      $check_user = $db->prepare("SELECT * FROM users WHERE username = ?");
      $check_user->bind_param("s", $username);

      if (!$check_user->execute()){
        array_push($errors, $db->error);
      }
      $result = $check_user->get_result();

      if ($result->num_rows == 1){
        while ($data = $result->fetch_assoc()) {
          if (password_verify($password, $data['password'])){
            $_SESSION['username'] = $username;
            $_SESSION['rank'] = $data['rank'];
            $_SESSION['success'] = "You are now logged in";
            header('location: dashboard.php');
            break;
          } else {
            array_push($errors, "Password verification failed");
            break;
          }
        }
      } else {
          array_push($errors, "Password verification failed");
      }

      $check_user->close();
      $db->close();
    }
  }
  ?>
