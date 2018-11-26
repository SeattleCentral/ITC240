<?php

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
    <title>People</title>
</head>
<body>
    <h1>People List</h1>
    
    <ul>
        <?php
            $peopleQuery = $db->prepare(
                "SELECT * FROM people"    
            );
            $peopleQuery->execute();
            $myPeople = $peopleQuery->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($myPeople as $person) {
                echo "<li>" . $person['name'] . "</li>";
            }
        ?>
    </ul>

    <a href="./members.php">
        Go to Members Page.
    </a>
</body>
</html>