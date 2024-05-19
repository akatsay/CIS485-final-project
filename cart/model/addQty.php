<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require_once __DIR__ . '/../../utils/DataSource.php';
    session_start();

    // Get the code and price from the URL parameter
    $code = $_GET['code'];
    $price = $_GET['price'];
    $userid = $_SESSION['user'];

    $dataSource = new DataSource();

    // Prepare and execute insert query
    $query = "INSERT INTO cart (userid, code, quantity, price) VALUES (:userid, :code, :quantity, :price)";
    $params = [
        ':userid' => $userid,
        ':code' => $code,
        ':quantity' => 1,
        ':price' => $price
    ];

    try {
        $result = $dataSource->runQuery($query, $params);
        // header('Location: ../views/success.php');
        // exit(); // Always exit after redirection
    } catch (PDOException $e) {
        echo 'Error adding item to cart';
    }
}
?>
