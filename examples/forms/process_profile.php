<?php

define('BASEPATH', dirname(__FILE__));

$name = '';
$photoPath = null;

if (isset($_POST['name'])) {
    $name = $_POST['name'];
}

if (isset($_FILES['profile_photo'])) {
    $photoPath = '/media/'.basename($_FILES['profile_photo']['name']);
    $photoFullPath = BASEPATH.$photoPath;
    // Example: /home/ec2-user/environment/forms/media/IMG001.jpg'
    
    if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $photoFullPath)) {
        // Yay!
    } else {
        $photoPath = null;
        die('Move failed.');
        // Your file size is probably too large.
    }
} else {
    die('No $_FILES');
}

header('Location: /my_profile.php?name='.$name.'&photo='.$photoPath);
