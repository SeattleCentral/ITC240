<?php
session_start();

$loggedIn = false;
if ($_SESSION['valid'] == true) {
    $loggedIn = true;
}

if (!defined(BASEPATH)) {
    define('BASEPATH', dirname(__FILE__));
}

require_once BASEPATH . '/connect.php';

$db = connectDB();

if ($db == null) {
    echo "Database Connection Error";
    die();
}

?>

<html>
<?php include BASEPATH . '/includes/header.php' ?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Hacker Blog</h1>
            </div>
            <div class="col-md-6 text-right">
                <?php if ($_SESSION['valid']): ?>
                    <a href="./blogForm.php">Add new blog</a>
                    &nbsp; | &nbsp;
                    <a href="./logout.php">
                        Logout
                    </a>
                <?php else: ?>
                    <a href="./login.php">
                        Editor login
                    </a>
                <?php endif ?>
            </div>
        </div>
        
        <?php
            $query = $db->prepare(
                'SELECT *, blog.id as id FROM blog LEFT JOIN editor ON editor.id = blog.editor_id'
            );
            $query->execute();
            $blogs = $query->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="row">
            <div class="col-md-12">
                <?php foreach($blogs as $blog): ?>
                    <div class="jumbotron">
                        <h2 class="display-6">
                            <?php echo $blog['title']; ?>
                            <?php if ($loggedIn): ?>
                                <a href="/blogForm.php?edit=<?php echo $blog['id']; ?>"
                                   class="btn btn-primary">
                                    Edit
                                </a>
                            <?php endif ?>
                        </h2>
                        <em>Author: <?php echo $blog['name']; ?></em>
                        <p class="lead">
                            <?php echo $blog['content']; ?>
                        </p>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    
    <?php include BASEPATH . '/includes/footer.php' ?>
</body>
</html>