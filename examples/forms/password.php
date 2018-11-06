<?php

echo "Enter a password to hash:\n";
$password = fgets(STDIN);

echo "\nYour hashed password is: " .
     password_hash($password, PASSWORD_DEFAULT, ['salt' => 'seafoodtastesgreatandissalty']) .
     "\n\n";