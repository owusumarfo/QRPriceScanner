<?php
// Function to connect to the database
  function connect_to_db() {
    global $host, $db_name, $db_user, $db_pass;
    try {
      $pdo = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_pass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch(PDOException $e) {
      die("Error connecting to database: " . $e->getMessage());
    }
  }
  
  // Function to attempt user login
  function login($username, $password) {
    $pdo = connect_to_db();
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
  
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
      // Verify password using a secure hashing algorithm (e.g., password_verify)
      if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $username; // Optional, for display purposes
        $_SESSION['full_name'] = $user['full_name']; // Optional, for display purposes
        return true; // Login successful
      } else {
        return false; // Invalid password
      }
    } else {
      return false; // Username not found
    }
  }

  // Function to log the user out
  function logout() {
    // Unset all session variables
    session_unset();
    // Destroy the session
    session_destroy();
  }


  // Function to add product
  function add_product($productName, $productDesc, $productCostPrice, $productSellingPrice, $productDiscountedPrice, $productStock) {

    // Connect to database and prepare statement
    $pdo = connect_to_db();
    $sql = "INSERT INTO products (product_name, product_description, cost_price, selling_price, discounted_price, stock) VALUES (:productName, :productDesc, :productCostPrice, :productSellingPrice, :productDiscountedPrice, :productStock)";
    $stmt = $pdo->prepare($sql);

    // Bind values and execute
    $stmt->bindParam(":productName", $productName);
    $stmt->bindParam(":productDesc", $productDesc);
    $stmt->bindParam(":productCostPrice", $productCostPrice);
    $stmt->bindParam(":productSellingPrice", $productSellingPrice);
    $stmt->bindParam(":productDiscountedPrice", $productDiscountedPrice);
    $stmt->bindParam(":productStock", $productStock);
    $stmt->execute();

    // Get the newly inserted product ID (optional)
    $product_id = $pdo->lastInsertId();

    generate_qr($product_id);
  }

  // Insert QR into QR table
  function add_qr($product_id, $path) {
    $qr_code_data = $path; // Replace with actual data

    // Connect to database and prepare statement
    $pdo = connect_to_db();
    $sql = "INSERT INTO qr_codes (product_id, qr_code_data) VALUES (:product_id, :qr_code_data)";
    $stmt = $pdo->prepare($sql);

    // Bind values and execute
    $stmt->bindParam(":product_id", $product_id);
    $stmt->bindParam(":qr_code_data", $qr_code_data);
    $stmt->execute();
  }

  // Generate QR
  function generate_qr($product_id) {
    // Include the qrlib file 
    include 'phpqrcode/qrlib.php'; 
    $text = getenv('SITE_URL') . "/qr?p=".$product_id; 
      
    $path = 'qr_images/'; 
    $file = $path.uniqid().".png"; 
      
    // $ecc stores error correction capability('L') 
    $ecc = 'L'; 
    $pixel_Size = 10; 
    $frame_Size = 1; 
      
    // Generates QR Code and Stores it in directory given 
    QRcode::png($text, $file, $ecc, $pixel_Size, $frame_Size); 
      
    // Displaying the stored QR code from directory 
    // echo "<center><img src='".$file."'></center>"; 

    add_qr($product_id, $file);
  }

  // Function to show all products
  function get_all_products($limit) {
    $pdo = connect_to_db();
    // $sql = "SELECT * FROM products LIMIT $limit";
    $sql = "SELECT p.*, qr.qr_code_data
        FROM products p
        LEFT JOIN qr_codes qr ON p.product_id = qr.product_id LIMIT $limit";

    $stmt = $pdo->prepare($sql);
    
    // Bind values and execute
    $stmt->execute();

    // Fetch all products as an associative array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }

  // Calculate discount
  function calculateDiscount($sellingPrice, $discountedPrice) {
    // return number_format($sellingPrice - ($sellingPrice * ($discountedPrice/100)));
    if($discountedPrice > 0):
      return number_format(($discountedPrice / $sellingPrice) * 100) - 100;
    else:
      return 0;
    endif;
  }

  // Count total products
  function get_total_products() {
    // Prepare SQL statement to count products
    $pdo = connect_to_db();
    $sql = "SELECT COUNT(*) AS total_products FROM products";
    $stmt = $pdo->prepare($sql);
  
    // Execute the query
    $stmt->execute();
  
    // Fetch the result (single row with total count)
    $total_count = $stmt->fetch(PDO::FETCH_ASSOC);
  
    // Return the total product count
    if ($total_count) {
      return $total_count['total_products'];
    } else {
      return 0; // Or handle missing data differently
    }
  }

  // Count total items in stock
  function get_total_stock() {
    // Prepare SQL statement to sum stock quantities
    $pdo = connect_to_db();
    $sql = "SELECT SUM(stock) AS total_stock FROM products";
    $stmt = $pdo->prepare($sql);
  
    // Execute the query
    $stmt->execute();
  
    // Fetch the result (single row with total stock)
    $total_stock = $stmt->fetch(PDO::FETCH_ASSOC);
  
    // Return the total stock count (or 0 if none found)
    if ($total_stock) {
      return number_format($total_stock['total_stock']);
    } else {
      return 0;
    }
  }

    // Count total scans
    function get_total_scans() {
      // Prepare SQL statement to count products
      $pdo = connect_to_db();
      $sql = "SELECT COUNT(*) AS total_scans FROM scan_events";
      $stmt = $pdo->prepare($sql);
    
      // Execute the query
      $stmt->execute();
    
      // Fetch the result (single row with total count)
      $total_count = $stmt->fetch(PDO::FETCH_ASSOC);
    
      // Return the total product count
      if ($total_count) {
        return $total_count['total_scans'];
      } else {
        return 0; // Or handle missing data differently
      }
    }

    // Get product by iD
    function get_product_by_id($product_id) {
      $pdo = connect_to_db();
      $sql = "SELECT *, stock FROM products WHERE product_id = :product_id";
      $stmt = $pdo->prepare($sql);

      // Bind values and execute
      $stmt->bindParam(":product_id", $product_id);

      $stmt->execute();

      $product = $stmt->fetch(PDO::FETCH_ASSOC);

      store_scan_event($product_id);
      return $product;
    }

    // Store scan event
    function store_scan_event($product_id) {
      $pdo = connect_to_db();
      $sql = "INSERT INTO scan_events (product_id) VALUES (:product_id)";
      $stmt = $pdo->prepare($sql);
    
      // Get current timestamp
      //$scanned_at = date('Y-m-d H:i:s');
    
      // Bind parameters
      $stmt->bindParam(":product_id", $product_id);
    
      // Execute the query
      $result = $stmt->execute();
    
      // Return true if successful, false otherwise
      return $result;
    }

    // itemWithDiscount
    function itemWithDiscount($sellingPrice, $discountedPrice) {
      if($discountedPrice > 0):
        return '<small><strike> <sup>GHS</sup>' . $sellingPrice. '</strike></small>' . ' <sup><small>GHS</small></sup>' . $discountedPrice;
      else:
        return '<sup><small>GHS</small></sup>' . $sellingPrice;
      endif;
    }

    // scan counts by product
    function get_scan_counts_by_product() {
      // Prepare SQL statement with JOIN and COUNT
      $pdo = connect_to_db();
      // $sql = "SELECT p.product_name, COUNT(se.scan_id) AS scan_count
      //         FROM scan_events se
      //         INNER JOIN qr_codes qr ON se.qr_id = qr.qr_id
      //         INNER JOIN products p ON qr.product_id = p.product_id
      //         GROUP BY p.product_id";
      $sql = "SELECT p.product_id, p.product_name, qr.qr_code_data, COUNT(se.scan_id) AS scan_count
              FROM scan_events se
              INNER JOIN qr_codes qr ON se.product_id = qr.product_id
              INNER JOIN products p ON se.product_id = p.product_id
              GROUP BY p.product_id";
      $stmt = $pdo->prepare($sql);
    
      // Execute the query
      $stmt->execute();
    
      // Fetch results as an associative array
      $product_scans = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
      return $product_scans;  // Return array of product names and scan counts
    }

    //edit product
    function edit_product($product_id, $productName, $productDesc, $productCostPrice, $productSellingPrice, $productDiscountedPrice, $productStock) {
      $pdo = connect_to_db();
      $sql = "UPDATE products
              SET product_name = :product_name,
                  product_description = :product_description,
                  cost_price = :cost_price,
                  selling_price = :selling_price,
                  discounted_price = :discounted_price,
                  stock = :stock
              WHERE product_id = :product_id";
    
      $stmt = $pdo->prepare($sql);
    
      // Prepare parameters
      $params = [
        ":product_name" => $productName,
        ":product_description" => $productDesc,
        ":cost_price" => $productCostPrice,
        ":selling_price" => $productSellingPrice,
        ":discounted_price" => $productDiscountedPrice,
        ":stock" => $productStock,
        ":product_id" => $product_id,
      ];
    
      // Execute the query with parameters
      $result = $stmt->execute($params);
    
      // Return true if successful, false otherwise
      return $result;
    }

    // Delete product
    function delete_product($product_id) {
      // Prepare SQL statement using DELETE for products
      $pdo = connect_to_db();
      $sql_products = "DELETE FROM products WHERE product_id = :product_id";
      $stmt_products = $pdo->prepare($sql_products);
    
      // Bind parameter for product ID
      $stmt_products->bindParam(":product_id", $product_id);
    
      // Execute the query for products (DELETE product first)
      $result_products = $stmt_products->execute();
    
      // Check if product deletion was successful
      if ($result_products && $stmt_products->rowCount() > 0) {
    
        // Prepare SQL statement using DELETE for qr_codes (if product deleted)
        $sql_qr_codes = "DELETE FROM qr_codes WHERE product_id = :product_id";
        $stmt_qr_codes = $pdo->prepare($sql_qr_codes);
    
        // Bind parameter (reuse the same product ID)
        $stmt_qr_codes->bindParam(":product_id", $product_id);
    
        // Execute the query for qr_codes
        $result_qr_codes = $stmt_qr_codes->execute();
      }
    
      // Return true if product deletion was successful (and potentially QR code deletion)
      return $result_products && $stmt_products->rowCount() > 0;
    }