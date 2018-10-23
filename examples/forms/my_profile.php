<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
</head>
<body>
    <h1>My Profile</h1>
    <?php if (isset($_GET['name'])): ?>
        <p>
            My name is:
            <strong>
                <?php echo $_GET['name']; ?>
            </strong>
        </p>
    <?php endif ?>
    <?php if (isset($_GET['photo'])): ?>
        <p>
            <img src="<?php echo $_GET['photo']; ?>"></img>
        </p>
    <?php endif ?>
</body>
</html>