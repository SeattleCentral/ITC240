<!DOCTYPE html>
<html>
<head>
    <title>Admin Only</title>
</head>
<body>
    <h1>
        Admin Only
    </h1>
    
    <?php
        $loggedIn = false;
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password= $_POST['password'];
            }
            
            $adminUsers = [
                'admin' => '$2y$10$RA.reA5hDm2Xwu6QETVfpOGhNCgteQEt/p8krq.ZNFAqomtC/yIAq',
                'jimmy' => '$2y$10$cpqN6H6yMPktW4iC8MDGm.u5DRwaOJVp.HVfUlALkvU7EL5Z5YmjO'
            ];
            
            if (isset($adminUsers[$username])) {
                if (password_verify($password, $adminUsers[$username])) {
                    $loggedIn = true;
                }
            }
            
            if (!$loggedIn) {
                echo "<strong>Invalid credentials.</strong>";
            } else {
                echo "<h3>Guestbook submissions</h3>";
                $guests = fopen("guests.txt", "r");
                while (!feof($guests)) {
                    echo fgets($guests) . "<br>";
                }
                fclose($guests);
                echo "<hr>";
            }
        }
    
    ?>
    
    <?php if (!$loggedIn): ?>
        <form method="post" action="">
            <p>
                <label for="username">
                    Username:
                </label>
                <input type="text" name="username" />
            </p>
            
            <p>
                <label for="password">
                    Password:
                </label>
                <input type="password" name="password" />
            </p>
            
            <p>
                <button type="submit">
                    Login
                </button>
            </p>
        </form>
    <?php endif ?>
</body>
</html>