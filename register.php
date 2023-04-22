<?php

require_once("includes/config.php");
require_once("includes/classes/FormSanitaizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/GetInputValues.php");


$account = new Account($conn);

if (isset($_POST["submit_button"])) {

    $firstName = FormSanitaizer::sanitzaFormString($_POST["first_name"]);
    $lastName = FormSanitaizer::sanitzaFormString($_POST["last_name"]);
    $username = FormSanitaizer::sanitzaFormUsername($_POST["user_name"]);
    $email = FormSanitaizer::sanitzaFormEmail($_POST["email"]);
    $confirmEmail = FormSanitaizer::sanitzaFormEmail($_POST["confirm_email"]);
    $password = FormSanitaizer::sanitzaFormPassword($_POST["password"]);
    $confirmPassword = FormSanitaizer::sanitzaFormPassword($_POST["confirm_password"]);


    $success = $account->register($firstName, $lastName, $username, $email, $confirmEmail, $password, $confirmPassword);

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

        <form action="register.php" method="POST">
            <h2>Sign Up</h2>

            <?php echo $account->getError(Constants::$firstNameCharacters); ?>
            <input type="text" name="first_name" placeholder="First Name" required value="<?php GetInputValues::getinputValue("first_name"); ?>">
            <?php echo $account->getError(Constants::$lastNameCharacters); ?>
            <input type="text" name="last_name" placeholder="Last Name" required value="<?php GetInputValues::getinputValue("last_name"); ?>">
            <?php echo $account->getError(Constants::$usernameCharacters); ?>
            <input type="text" name="user_name" placeholder="Username" required value="<?php GetInputValues::getinputValue("user_name"); ?>">
            <?php echo $account->getError(Constants::$emailsDontMatch); ?>
            <?php echo $account->getError(Constants::$emailInvalid); ?>
            <?php echo $account->getError(Constants::$emailTaken); ?>
            <input type="email" name="email" placeholder="Email" required value="<?php GetInputValues::getinputValue("email"); ?>">
            <input type=" email" name="confirm_email" placeholder="Confirm Email" required value="<?php GetInputValues::getinputValue("confirm_email"); ?>">
            <?php echo $account->getError(Constants::$passwordsDontMatch); ?> <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
            <input type=" password" name="password" placeholder="Password" required value="<?php GetInputValues::getinputValue("password"); ?>">
            <input type=" password" name="confirm_password" placeholder="Confrim Password" required value="<?php GetInputValues::getinputValue("confirm_password"); ?>">
            <a href=" login.php">Already have an account? Sign in here.</a>
            <button name="submit_button">Sign Up</button>
        </form>
    </div>

    <?php require_once('includes/footer.php'); ?>