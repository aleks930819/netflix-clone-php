<?php

require_once("includes/config.php");
require_once("includes/classes/FormSanitaizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

$account = new Account($conn);

if (isset($_POST["submit_button"])) {

    $firstName = FormSanitaizer::sanitzaFormString($_POST["first_name"]);
    $lastName = FormSanitaizer::sanitzaFormString($_POST["last_name"]);
    $username = FormSanitaizer::sanitzaFormUsername($_POST["user_name"]);
    $email = FormSanitaizer::sanitzaFormEmail($_POST["email"]);
    $confirmEmail = FormSanitaizer::sanitzaFormEmail($_POST["confirm_email"]);
    $password = FormSanitaizer::sanitzaFormPassword($_POST["password"]);
    $confirmPassword = FormSanitaizer::sanitzaFormPassword($_POST["confirm_password"]);


    $account->register($firstName, $lastName, $username, $email, $confirmEmail, $password, $confirmPassword);
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
                <h2>Sign Up</h2>

                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="last_name" placeholder="Last Name" required>
                <input type="text" name="user_name" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="email" name="confirm_email" placeholder="Confirm Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confrim Password" required>
                <a href="login.php">Already have an account? Sign in here.</a>
                <button name="submit_button">Sign Up</button>
            </form>
        </div>
</body>

</html>