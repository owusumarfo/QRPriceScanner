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


$delete_message = '';
// Handle edit product submission
if (isset($_GET['id'])) {
  $product_id= trim($_POST['product_id']);

  delete_product($product_id);
  $delete_message = "Item was deleted successfully";
}
?>

<?php
include_once('functions.php');

// Check if user is logged in for protected pages
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to login page
    header("Location: /login");
    exit();
}
if (isset($_GET['logout'])) {
    logout();
    header("Location: /login");
    exit();
}
?>



<?php
include 'Template.php';
Template::view('delete-product.html', [
    'title' => 'Delete Product - ABC Retail',
    'page_title' => 'Delete Product',
    'products_active' => 'active',
    'delete_message' => $delete_message,
    'colors' => ['red','blue','green'],
    'product' => delete_product($_GET['id'])
  ]);
?>