<!DOCTYPE html>
<html>
<head>
    <title>Guestbook</title>
</head>
<bod>
    <h1>
        My Guestbook
    </h1>
    
    <hr>
    
    <?php
        // Track fields with errors
        $errors = [];
        
        // Only process on submit.
        $guest_name = $guest_email = $phone = '';
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['guest_name'])) {
                $errors[] = 'guest_name';
            } else {
                $guest_name = $_POST['guest_name'];
            }
            if (isset($_POST['guest_email'])) {
                $guest_email = $_POST['guest_email'];
                if (!filter_var($guest_email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = 'guest_email';
                }
            } else {
                $errors[] = 'guest_email';
            }
            
            if (isset($_POST['phone'])) {
                $phone = $_POST['phone'];
                $processedPhone = preg_replace('/\D/', '', $phone);
                var_dump($processedPhone);
                if (strlen($processedPhone) < 10) {
                    $errors[] = 'phone';
                }
            } else {
                $errors[] = 'phone';
                // array_push($errors, 'phone');
            }
            
            if (count($errors) > 0) {
                echo "<strong style='color: red'>Fix the errors.</strong>";
                echo "<ul>";
                foreach ($errors as $error) {
                    echo "<li>Required field: $error</li>";
                }
                echo "</ul>";
            } else {
                $guestFile = fopen('guests.txt', 'a');
                fwrite(
                    $guestFile,
                    "Guest: $guest_name\nEmail: $guest_email\nPhone: $phone\n\n"
                );
                fclose($guestFile);
                echo "<strong>Thank you, $guest_name.</strong>";
                $guest_name = $guest_email = $phone = '';
            }
        }
    ?>
    
    <hr>
    
    <h3>
        Sign the Guestbook
    </h3>
    <em>
        * fields are required
    </em>

    
    <form method="post" action="">
        <p>
            <label for="guest_name">
                Enter your name:*
            </label>
            <input type="text" name="guest_name" value="<?php echo $guest_name; ?>">
            <?php if (in_array('guest_name', $errors)): ?>
                <br>
                <span style="color: red">Field is required.</span>
            <?php endif ?>
        </p>
        
        <p>
            <label for="guest_email">
                Enter a valid email:*
            </label>
            <input type="text" name="guest_email" value="<?php echo $guest_email; ?>">
            <?php if (in_array('guest_email', $errors)): ?>
                <br>
                <span style="color: red">Valid email is required.</span>
            <?php endif ?>
        </p>
        
        <p>
            <label for="phone">
                Please enter a phone number:
            </label>
            <input type="text" name="phone" value="<?php echo $phone; ?>" />
            <?php if (in_array('phone', $errors)): ?>
                <br>
                <span style="color: red">Valid phone number is required.</span>
            <?php endif ?>
        </p>
        
        <p>
            <button type="submit">
                Sign Guestbook
            </button>
        </p>
    </form>
    
</bod>
</html>