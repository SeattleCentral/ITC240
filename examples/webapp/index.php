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
    <?php
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['name'])) {
                $name = $_POST['name'];
                $addPerson = $db->prepare(
                    "INSERT INTO people (name) VALUES (:name)"
                );
                $success = $addPerson->execute([
                    "name" => $name
                ]);
                if ($success) {
                    echo "<h3>Person added, $name</h3>";
                }
            }
        }
    ?>
    
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
    
    <hr>
    
    <h2>
        Add New Person
    </h2>
    <form method="post" action="">
        <p>
            <label for="name">Person Name:</label>
            <input type="text" name="name" value="" />
        </p>
        <p>
            <input type="submit" value="Submit" />
        </p>
    </form>
</body>
</html>