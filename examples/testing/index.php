<html>
    
<body>
    <h1>
        Welcome to My Site
    </h1>
    
    <?php if(!empty($_GET['search'])): ?>
        <strong>
            You searched for: <?php echo $_GET['search']; ?>
        </strong>
    <?php endif ?>
</body>
</html>