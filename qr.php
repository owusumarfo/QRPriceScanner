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

?>

<?php
include 'Template.php';
Template::view('qr.html', [
    'title' => 'QR Code - ABC Retail',
    'page_title' => 'QR Code',
    'colors' => ['red','blue','green'],
    'product' => get_product_by_id($_GET['p'])
  ]);
?>