<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../../utils/DataSource.php';

    // Retrieve form values
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    // Validate userid
    if (!$userid) {
        $errors[] = "Input username!";
    }

    // Validate passwords

    if (!$password) {
        $errors[] = "Input password!";
    }

    // Check if there are any errors
    if (empty($errors)) {
        // If no errors, proceed with login
        $dataSource = new DataSource();

        // Prepare and execute select query
        $query = "SELECT userid, password FROM login WHERE userid = :userid";
        $params = [
            ':userid' => $userid,
        ];

        try {
            $result = $dataSource->runQuery($query, $params);
            $user = $result->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['PASSWORD'])) {
                // Login successful
                session_start();
                $_SESSION['user'] = $user['USERID']; // Store userid in session
                header('Location: ../../');
                exit();
            } else {
                $errors[] = 'Invalid username or password!';
            }
        } catch (PDOException $e) {
            $errors[] = 'Failed to login: ' . $e->getMessage();
        }
    }

    // Store errors in session
    session_start();
    $_SESSION['login_errors'] = $errors;

    // Redirect to error.php
    header('Location: ../views/error.php');
    exit();
}
?>
