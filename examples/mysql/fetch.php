<?php

define('BASEPATH', dirname(__FILE__));

require_once BASEPATH . '/connect.php';

$db = connectDB();

if ($db == null) {
    echo "<h1>Uh OH!</h1>"; die();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>People</title>
</head>
</html>
<body>
    <h1>People</h1>
    
    <ul>
        <?php
            $query = $db->prepare('SELECT * FROM people');
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $person) {
                echo "<li>".$person['name']."</li>";
            }
        ?>
    </ul>

    <p>
        The big boss is:
        <strong>
            <?php
                $bossQuery = $db->prepare("SELECT * FROM people WHERE id = :id");
                $bossQuery->execute([
                    "id" => 1    
                ]);
                $boss = $bossQuery->fetch(PDO::FETCH_ASSOC);
                echo $boss['name'];
            ?>
        </strong>
    </p>
</body>
