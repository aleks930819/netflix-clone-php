<?php

require_once("includes/config.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/FormSanitaizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/GetInputValues.php");

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

<?php require_once('includes/header.php'); ?>


<div class="sign_in_container">
    <div class="header">
        <img src="assets/images/logo.png" title="Logo" alt="Site logo" />
    </div>

    <div class="column">
        <form action="login.php" method="POST">
            <h2>Sign In</h2>
            <?php echo $account->getError(Constants::$loginFailed); ?>
            <input type="text" name="user_name" placeholder="Username" required value="<?php GetInputValues::getinputValue("user_name"); ?>">
            <input type="password" name="password" placeholder="Password" required value="<?php GetInputValues::getinputValue("password"); ?>">

            <a href="register.php">Don't have an account? Sign up here.</a>
            <button name="submit_button">Sign In</button>
        </form>
    </div>
    </body>

    </html>


    <?php require_once('includes/footer.php'); ?>