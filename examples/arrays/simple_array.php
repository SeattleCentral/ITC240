<!DOCTYPE html>
<html>
<head>
    <title>To Do List</title>
</head>
<body>
    <h1>To Do List</h1>
    <?php
    $dataFromDatabase = ["Get milk", "Finish Homework", "Walk the Dog"];
    ?>
    <ul>
        <?php foreach($dataFromDatabase as $todoItem): ?>
            <li>
                <?php echo $todoItem; ?>
            </li>
        <?php endforeach ?>
    </ul>
</body>
</html>