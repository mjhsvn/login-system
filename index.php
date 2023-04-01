<?php require_once('../Connections/login.php'); ?>
<?php
session_start();
if (!isset($_SESSION['USER_ID'])) {
    header("Location: login.php");
    exit();
}else{
    $qryUSER_ID=$_SESSION['USER_ID'];
}

?>
<?php
$usernameErr = $passwordErr = $password_confirmErr = $password_matchErr = "";
$username = $password = $password_confirm = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["Username"])) {
    $UsernameErr = "Username is required";
  } else {
    $Username = test_input($_POST["Username"]);
    if (!preg_match("/^[a-z0-9_.A-Z-' ]*$/",$Username)) {
      $UsernameErr = "Only letters, numbers and white space allowed";
    }
  }

  if (empty($_POST["Your Email"])) {
    $Your_EmailErr = "Your email is required";
  } 
  
  }
  
  if (empty($_POST["Password"])) {
    $PasswordErr = "Password is required";
  } else {
    $Password = test_input($_POST["Password"]);
  }

  if (empty($_POST["Repeat_your_password"])) {
    $Repeat_your_passwordErr = "Password confirm is required";
  } else {
    $Repeat_your_password = test_input($_POST["Password_confirm"]);
  }
  
  if ($_POST['Password'] !== $_POST['Password_confirm']) {
    $Repeat_your_password = "Passwords must match";   
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>