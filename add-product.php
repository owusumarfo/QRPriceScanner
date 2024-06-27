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


$add_message = '';
// Handle add product submission
if (isset($_POST['submit'])) {
  $productName = trim($_POST['productName']);
  $productDesc = trim($_POST['productDesc']);
  $productCostPrice = trim($_POST['productCostPrice']);
  $productSellingPrice = trim($_POST['productSellingPrice']);
  $productDiscountedPrice = trim($_POST['productDiscountedPrice']);
  $productStock = trim($_POST['productStock']);

  add_product($productName, $productDesc, $productCostPrice, $productSellingPrice, $productDiscountedPrice, $productStock);
  $add_message = "Item was added successfully";
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
Template::view('add-product.html', [
    'title' => 'Add Product - ABC Retail',
    'page_title' => 'Add Product',
    'products_active' => 'active',
    'add_message' => $add_message,
    'colors' => ['red','blue','green']
  ]);
?>