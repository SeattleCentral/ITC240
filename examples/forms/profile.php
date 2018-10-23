<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
</head>
<body>
    <h1>
        New Profile
    </h1>
    <form action="/process_profile.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="name">
                Your name:
            </label>
            <input type="text" name="name">
        </p>
        <p>
            <lable for="profile_photo">
                Profile photo:
            </lable>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000000">
            <input type="file" name="profile_photo">
        </p>
        <p>
            <button type="submit">
                Save profile
            </button>
        </p>
    </form>
</body>
</html>