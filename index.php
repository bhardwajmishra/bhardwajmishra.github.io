<?php

// 1. Insecure dynamic file inclusion (LFI/RFI vulnerability)
$page = $_GET['page'];
include($page); // Vulnerable to Local/Remote File Inclusion

// 2. Undefined variable/index error
// Accessing 'username' index without checking if it exists in the $_POST array
echo "Welcome, " . $_POST['username'] . "!";

// 3. Direct output of unescaped user input (XSS vulnerability)
$comment = $_POST['comment'];
echo "<div>" . $comment . "</div>"; // Vulnerable to Cross-Site Scripting (XSS)

// 4. Insecure password handling (storing in plain text)
$password = "mySecretPassword";
// In a real application, passwords should be hashed using password_hash()

// 5. Hardcoding configuration data (e.g., database credentials)
$db_host = "localhost";
$db_user = "root";
$db_pass = "admin123";
$db_name = "test_db";

// 6. Poor error handling: using the @ error control operator to suppress errors
@mysql_connect($db_host, $db_user, $db_pass); // Deprecated and error-prone

// 7. Inconsistent coding style (mixing indentation, using short tags)
if($page != "") { // inconsistent bracing and spacing
	echo "Page loaded"; # using # for comment
}

// 8. Code duplication (simplified example)
function calculate_something($value) {
    return $value * 2;
}

function calculate_something_else($value) {
    return $value + $value; // duplicate logic
}

// 9. Lack of type hinting/strict types (loose typing can lead to runtime errors)
function add($a, $b) {
    return $a + $b;
}

// 10. Unused variable
$unused_variable = "I am never used"; // PHPMD/static analysis will flag this

// 11. Command injection vulnerability
$ip_address = $_GET['ip'];
echo shell_exec("ping -c 4 " . $ip_address); // User input directly in system command

?>

