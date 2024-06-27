<?php
// env
include_once('DevCoder.php');
use DevCoder\DotEnv;
(new DotEnv(__DIR__ . '/.env'))->load();
?>

<?php
include_once('functions.php');
?>

<?php
// Start the session (important for session variables)
session_start();

// Define database connection details (replace with your actual details)
$host = "localhost";
$db_name = getenv('DATABASE_NAME');
$db_user = getenv('DATABASE_USER');
$db_pass = getenv('DATABASE_PASS');


$login_error = '';
// Handle login form submission (if applicable)
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = trim($_POST['username']);
  $password = $_POST['password'];

  if (login($username, $password)) {
    // Login successful, redirect or display a message
    header("Location: /dashboard"); // Replace with your desired location
    exit();
  } else {
    // Login failed, display an error message
    $login_error = "Invalid username or password";
  }
}
?>


<?php
include 'Template.php';
Template::view('login.html', [
  'title' => 'Login - ABC Retail',
  'login_error' => $login_error,
  'colors' => ['red','blue','green']
]);
?>