<?php

if (isset($_POST["submit_button"])) {
    // Register button was pressed
    echo 'Register button was pressed';
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Netflix</title>
    <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
</head>

<body>
    <div class="sign_in_container">
        <div class="header">
            <img src="assets/images/logo.png" title="Logo" alt="Site logo" />
        </div>

        <div class="column">
            <form action="register.php" method="POST">
                <h2>Sign In</h2>
                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="last_name" placeholder="Last Name" required>
                <input type="text" name="user_name" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="email" name="confirm_email" placeholder="Confirm Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confrim Password" required>
                <a href="register.php">Don't have an account? Sign up here.</a>
                <button name="submit_button">Sign In</button>
            </form>
        </div>
</body>

</html>