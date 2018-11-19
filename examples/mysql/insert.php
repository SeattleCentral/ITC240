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
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['name'])) {
                $name = $_POST['name'];
                $addQuery = $db->prepare("
                    INSERT INTO people (name) VALUES (:name);
                ");
                $result = $addQuery->execute([
                    'name' => $name
                ]);
                if ($result) {
                    echo "<h3> Successfully added, $name.</h3>";
                }
            }
        }
    ?>
    
    <h1>People List</h1>
    
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
    
    <hr>
    
    <form method="post" action="">
        <p>
            <label>
                Person's name:
            </label>
            <input type="text" name="name" />
        </p>
        <p>
            <input type="submit" value="Submit"/>
        </p>
    </form>
</body>
