<?php

require_once("includes/config.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/FormSanitaizer.php");

$account = new Account($conn);


if (isset($_POST["submit_button"])) {

    $username = FormSanitaizer::sanitzaFormUsername($_POST["user_name"]);
    $password = FormSanitaizer::sanitzaFormPassword($_POST["password"]);

    echo $username;
    echo $password;

    $success = $account->login($username, $password);

    if ($success) {
        // Store session
        $_SESSION["userLoggedIn"] = $username;
        header("Location: index.php");
    }
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
            <form action="login.php" method="POST">
                <h2>Sign In</h2>
                <input type="text" name="user_name" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <a href="register.php">Don't have an account? Sign up here.</a>
                <button name="submit_button">Sign In</button>
            </form>
        </div>
</body>

</html>