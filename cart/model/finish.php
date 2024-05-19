<?php
    require_once __DIR__ . '/../../utils/DataSource.php';

    $dataSource = new DataSource();
    session_start();
    $userid = $_SESSION['user'];

    // Prepare and execute select query
    $query = " DELETE 
          FROM cart 
          WHERE userid = :userid";
    $params = [':userid' => $userid];

    try {
        $result = $dataSource->runQuery($query, $params);
        header('Location: ../views/thankyou.php');
        exit(); // Always exit after redirection
    } catch (PDOException $e) {
        $errors[] = 'Failed to delete items: ' . $e->getMessage();
    }
?>