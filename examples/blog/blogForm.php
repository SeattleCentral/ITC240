<?php
session_start();

if (!$_SESSION['valid'] || !$_SESSION['editor_id']) {
    header('Location: /login.php');
    die();
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
$blog_id = "";
$title = "";
$content = "";
$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['title'] && !empty($_POST['content']))) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $editor_id = $_SESSION['editor_id'];
        $blog_id = $_POST['blog_id'];
        
        if (empty($blog_id)) {
            $query = $db->prepare(
                'INSERT INTO blog (editor_id, title, content)'.
                'VALUES (:editor_id, :title, :content)'
            );
            $result = $query->execute([
                'editor_id' => $editor_id,
                'title' => $title,
                'content' => $content
            ]);
        } else {
            $query = $db->prepare(
                'UPDATE blog SET title = :title, content = :content '.
                'WHERE id = :blog_id'
            );
            $result = $query->execute([
                'title' => $title,
                'content' => $content,
                'blog_id' => $blog_id
            ]);
        }
        
        
        if ($result) {
            header('Location: /index.php');
        } else {
            $error = "Unable to create the blog.";
        }
    }
} else {
    if (isset($_GET['edit'])) {
        $blog_id = $_GET['edit'];
        $query = $db->prepare('SELECT * FROM blog WHERE id = :id');
        $query->execute([
            'id' => $blog_id
        ]);
        $blog = $query->fetch(PDO::FETCH_ASSOC);
        if ($blog) {
            $blog_id = $blog['id'];
            $title = $blog['title'];
            $content = $blog['content'];
        } else {
            $blog_id = "";
        }
    }
}

?>

<html>
<head>
    <?php $pageTitle = "Blog Editor Form"; ?>
    <?php include BASEPATH . '/includes/header.php'; ?>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    Blog Editor Form
                </h1>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php if ($error != ""): ?>
                    <strong>
                        <?php echo $error; ?>
                    </strong>
                <?php endif ?>
                
                <form action="" method="post">
                    <input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>">
                    <div class="form-group">
                        <label for="title">
                            Blog title:
                        </label>
                        <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
                    </div>
                    <div class="form-group">
                        <label for="content">
                            Blog content:
                        </label>
                        <br>
                        <textarea name="content" class="form-control"><?php echo $content; ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="Submit Blog" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    
    
    <?php include BASEPATH . '/includes/footer.php'; ?>
</body>
</html>