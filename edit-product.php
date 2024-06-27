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


$edit_message = '';
// Handle edit product submission
if (isset($_POST['submit'])) {
  $product_id= trim($_POST['product_id']);
  $productName = trim($_POST['productName']);
  $productDesc = trim($_POST['productDesc']);
  $productCostPrice = trim($_POST['productCostPrice']);
  $productSellingPrice = trim($_POST['productSellingPrice']);
  $productDiscountedPrice = trim($_POST['productDiscountedPrice']);
  $productStock = trim($_POST['productStock']);

  edit_product($product_id, $productName, $productDesc, $productCostPrice, $productSellingPrice, $productDiscountedPrice, $productStock);
  $edit_message = "Item was edited successfully";
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
Template::view('edit-product.html', [
    'title' => 'Edit Product - ABC Retail',
    'page_title' => 'Edit Product',
    'products_active' => 'active',
    'edit_message' => $edit_message,
    'colors' => ['red','blue','green'],
    'product' => get_product_by_id($_GET['id'])
  ]);
?>