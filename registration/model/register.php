<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../../utils/DataSource.php';

    // Retrieve form values
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $password_again = $_POST['password_again'];

    // Validate userid
    if (!$userid) {
        $errors[] = "Input username!";
    }

    // Validate passwords

    if (!$password) {
        $errors[] = "Input password!";
    }

    if ($password !== $password_again) {
        $errors[] = "Passwords do not match!";
    }

    // Check if there are any errors
    if (empty($errors)) {
        // If no errors, proceed with registration
        $dataSource = new DataSource();

        // Prepare and execute insert query
        $query = "INSERT INTO login (userid, password) VALUES (:userid, :password)";
        $params = [
            ':userid' => $userid,
            ':password' => password_hash($password, PASSWORD_DEFAULT) // Hash the password
        ];

        try {
            $result = $dataSource->insert($query, $params);
            header('Location: ../views/success.php');
            exit(); // Always exit after redirection
        } catch (PDOException $e) {
            if ($e->getCode() == 'HY000' && strpos($e->getMessage(), 'ORA-00001') !== false) {
                $errors[] = 'Username already exists!';
            } else {
                $errors[] = 'Failed to register user: ' . $e->getMessage();
            }
        }
    }

    // Store errors in session
    session_start();
    $_SESSION['errors'] = $errors;

    // Redirect to error.php
    header('Location: ../views/error.php');
    exit();
}
?>
