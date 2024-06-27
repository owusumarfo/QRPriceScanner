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
Template::view('scans.html', [
    'title' => 'Scans - ABC Retail',
    'page_title' => 'Scans',
    'scans_active' => 'active',
    'colors' => ['red','blue','green'],
    'scanned_products' => get_scan_counts_by_product()
  ]);
?>