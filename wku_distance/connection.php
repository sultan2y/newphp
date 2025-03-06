
<?php
define("db_server", "localhost");
define("db_user", "root");
define("db_name", "cde");
define("db_password", "");

$conn = new mysqli(db_server, db_user, db_password, db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!$conn->set_charset("utf8mb4")) {
    die("Error setting character set: " . $conn->error);
}
?>