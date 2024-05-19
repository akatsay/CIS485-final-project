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

    // Check if the item is already in the cart
    $query = "SELECT quantity FROM cart WHERE userid = :userid AND code = :code";
    $params = [
        ':userid' => $userid,
        ':code' => $code
    ];

    try {
        $result = $dataSource->runQuery($query, $params);
        $item = $result->fetch(PDO::FETCH_ASSOC);

        if ($item) {
            // If the item exists, update the quantity
            $newQuantity = $item['QUANTITY'] + 1;
            $updateQuery = "UPDATE cart SET quantity = :quantity WHERE userid = :userid AND code = :code";
            $updateParams = [
                ':quantity' => $newQuantity,
                ':userid' => $userid,
                ':code' => $code
            ];
            $dataSource->runQuery($updateQuery, $updateParams);
        } else {
            // If the item does not exist, insert a new row
            $insertQuery = "INSERT INTO cart (userid, code, quantity, price) VALUES (:userid, :code, :quantity, :price)";
            $insertParams = [
                ':userid' => $userid,
                ':code' => $code,
                ':quantity' => 1,
                ':price' => $price
            ];
            $dataSource->runQuery($insertQuery, $insertParams);
        }

        header('Location: ..');
        exit(); // Always exit after redirection
    } catch (PDOException $e) {
        echo 'Error adding item to cart';
    }
}
?>
