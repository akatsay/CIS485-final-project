<?php
require_once __DIR__ . '/../../utils/DataSource.php';

$dataSource = new DataSource();
session_start();
$userid = $_SESSION['user'];

// Get the code and action from the form submission
$code = $_POST['code'];
$action = $_POST['action'];

// Determine the SQL query based on the action
if ($action == 'increment') {
    $query = "UPDATE cart SET quantity = quantity + 1 WHERE userid = :userid AND code = :code";
} elseif ($action == 'decrement') {
    $query = "UPDATE cart SET quantity = quantity - 1 WHERE userid = :userid AND code = :code AND quantity > 1";
} elseif ($action == 'remove') {
    $query = "DELETE FROM cart WHERE userid = :userid AND code = :code";
} else {
    // Invalid action
    header('Location: ..');
    exit();
}

$params = [
    ':userid' => $userid,
    ':code' => $code
];

try {
    $result = $dataSource->runQuery($query, $params);
    header('Location: ..');
    exit(); // Always exit after redirection
} catch (PDOException $e) {
    $errors[] = 'Failed to update item quantity: ' . $e->getMessage();
}
?>
