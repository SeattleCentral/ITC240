<?php
session_start();

if (!defined(BASEPATH)) {
    define('BASEPATH', dirname(__FILE__));
}

require_once BASEPATH . '/connect.php';

$db = connectDB();

if ($db == null) {
    echo "Database Connection Error";
    die();
}

$loginFailed = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $db->prepare(
            'SELECT * FROM editor WHERE username = :username'
        );
        $query->execute([
            'username' => $username
        ]);
        $editor = $query->fetch(PDO::FETCH_ASSOC);
        if (count($editor)) {
            if (password_verify($password, $editor['password'])) {
                $_SESSION['valid'] = true;
                $_SESSION['name'] = $editor['name'];
                $_SESSION['editor_id'] = $editor['id'];
                header('Location: /index.php');
                exit();
            }
        }
    }
    $loginFailed = true;
}

?>

<html>
<head>
    <title>Editor login</title>
</head>
<body>
    <h1>
        Editor login
    </h1>
    
    <?php if ($loginFailed): ?>
        <strong>Incorrect username/password.</strong>
    <?php endif ?>
    
    <form method="post" action="">
        <p>
            <label for="username">
                Username:
            </label>
            <input type="text" name="username">
        </p>
        <p>
            <label for="password">
                Password:
            </label>
            <input type="password" name="password">
        </p>
        <p>
            <input type="submit" value="Login">
        </p>
    </form>
</body>
</html>