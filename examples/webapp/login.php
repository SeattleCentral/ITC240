<?php
session_start();

if ($_SESSION['valid'] == true) {
    header("Location: /members.php");
    die();
}

define('BASEPATH', dirname(__FILE__));

require_once BASEPATH . '/connect.php';

$db = connectDB();

if ($db == null) {
    echo "<h1>Uh oh!</h1>";
    die();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>My People</title>
</head>
<body>
    <?php
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $userQuery = $db->prepare(
                    "SELECT password FROM users WHERE username = :username"
                );
                $success = $userQuery->execute([
                    "username" => $username
                ]);
                if ($success) {
                    $passDB = $userQuery->fetch(PDO::FETCH_ASSOC)['password'];
                    if (password_verify($password, $passDB)) {
                        $_SESSION['valid'] = true;
                        $_SESSION['username'] = $username;
                        header("Location: /members.php");
                        exit();
                    } else {
                        $_SESSION['valid'] = false;
                        unset($_SESSION['username']);
                    }
                }
            }
        }
    ?>
    
    <h1>Login Form</h1>
    
    <hr>

    <form method="post" action="">
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" value="" />
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="text" name="password" value="" />
        </p>
        <p>
            <input type="submit" value="Submit" />
        </p>
    </form>
</body>
</html>