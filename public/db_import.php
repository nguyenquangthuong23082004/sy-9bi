<?php
// Standalone DB Importer for CodeIgniter 4
header('Content-Type: text/html; charset=utf-8');

// Simple key for security
if (!isset($_GET['key']) || $_GET['key'] !== 'autostyle123') {
    die("Error: Invalid security key. Use db_import.php?key=autostyle123");
}

$db_host = 'localhost';
$db_user = '';
$db_pass = '';
$db_name = '';

// Attempt to parse .env file
$envPath = __DIR__ . '/../.env';
if (file_exists($envPath)) {
    $envContent = file_get_contents($envPath);
    // Parse key-value pairs
    preg_match('/database.default.hostname\s*=\s*(.+)/', $envContent, $matches);
    if ($matches) $db_host = trim($matches[1], "\"' \r\n");
    
    preg_match('/database.default.username\s*=\s*(.+)/', $envContent, $matches);
    if ($matches) $db_user = trim($matches[1], "\"' \r\n");
    
    preg_match('/database.default.password\s*=\s*(.+)/', $envContent, $matches);
    if ($matches) $db_pass = trim($matches[1], "\"' \r\n");
    
    preg_match('/database.default.database\s*=\s*(.+)/', $envContent, $matches);
    if ($matches) $db_name = trim($matches[1], "\"' \r\n");
}

// Fallback to CodeIgniter database config if .env properties not found
if (empty($db_user) || empty($db_name)) {
    $dbConfigPath = __DIR__ . '/../app/Config/Database.php';
    if (file_exists($dbConfigPath)) {
        $dbConfig = file_get_contents($dbConfigPath);
        // Extract default group
        preg_match('/\'hostname\'\s*=>\s*(.+),/', $dbConfig, $matches);
        if ($matches) $db_host = trim($matches[1], "\"' \r\n");
        preg_match('/\'username\'\s*=>\s*(.+),/', $dbConfig, $matches);
        if ($matches) $db_user = trim($matches[1], "\"' \r\n");
        preg_match('/\'password\'\s*=>\s*(.+),/', $dbConfig, $matches);
        if ($matches) $db_pass = trim($matches[1], "\"' \r\n");
        preg_match('/\'database\'\s*=>\s*(.+),/', $dbConfig, $matches);
        if ($matches) $db_name = trim($matches[1], "\"' \r\n");
    }
}

// If still empty, ask user to fill it or check
if (empty($db_user) || empty($db_name)) {
    die("Error: Could not automatically detect database credentials. Please edit public/db_import.php and enter details manually.");
}

echo "<h3>Connecting to database: {$db_name} on {$db_host}...</h3>";

$mysqli = @new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$mysqli->set_charset("utf8mb4");

$sqlPath = __DIR__ . '/../dddfs.sql';
if (!file_exists($sqlPath)) {
    die("Error: SQL file 'dddfs.sql' not found in parent directory.");
}

echo "Reading dddfs.sql...<br>";
$sql = file_get_contents($sqlPath);

// Strip block comments
$sql = preg_replace('/\/\*(.*?)\*\//s', '', $sql);

// Strip single line comments
$sql = preg_replace('/^[ \t]*--.*\r?\n/m', '', $sql);
$sql = preg_replace('/^[ \t]*#.*\r?\n/m', '', $sql);

// Disable foreign keys
$mysqli->query("SET FOREIGN_KEY_CHECKS = 0;");

$queries = [];
$query = '';
$in_string = false;
$string_char = '';
$escaped = false;
$len = strlen($sql);

for ($i = 0; $i < $len; $i++) {
    $char = $sql[$i];
    if ($escaped) {
        $query .= $char;
        $escaped = false;
        continue;
    }
    if ($char === '\\') {
        $query .= $char;
        $escaped = true;
        continue;
    }
    if ($in_string) {
        $query .= $char;
        if ($char === $string_char) {
            $in_string = false;
        }
        continue;
    }
    if ($char === "'" || $char === '"' || $char === '`') {
        $query .= $char;
        $in_string = true;
        $string_char = $char;
        continue;
    }
    if ($char === ';') {
        $queries[] = $query;
        $query = '';
        continue;
    }
    $query .= $char;
}
if (trim($query) !== '') {
    $queries[] = $query;
}

echo "Found " . count($queries) . " statements to execute.<br><br>";

$success = 0;
$fail = 0;
foreach ($queries as $q) {
    $q = trim($q);
    if (empty($q)) continue;
    
    try {
        if ($mysqli->query($q)) {
            $success++;
        } else {
            $fail++;
            echo "<span style='color:red;'>Failed Query:</span> " . htmlspecialchars(substr($q, 0, 150)) . "...<br>";
            echo "<span style='color:red;'>Error:</span> " . $mysqli->error . "<br><br>";
        }
    } catch (\Throwable $e) {
        $fail++;
        echo "<span style='color:red;'>Failed Query (Exception):</span> " . htmlspecialchars(substr($q, 0, 150)) . "...<br>";
        echo "<span style='color:red;'>Error:</span> " . $e->getMessage() . "<br><br>";
    }
}

$mysqli->query("SET FOREIGN_KEY_CHECKS = 1;");
$mysqli->close();

echo "<h3>Import Finished!</h3>";
echo "Successful queries: {$success}<br>";
echo "Failed queries: {$fail}<br>";
echo "<p style='color:green; font-weight:bold;'>Please delete public/db_import.php immediately for security!</p>";
?>
