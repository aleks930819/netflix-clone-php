<?php

/**
 *  Constants class
 * 
 */
class Constants
{
    /**
     *  $firstNameCharacters - error message for first name
     *   
     *  @var string
     */
    public static $firstNameCharacters = "Your first name must be between 2 and 25 characters";

    /**
     *  $lastNameCharacters - error message for last name
     *   
     *  @var string
     */
    public static $lastNameCharacters = "Your last name must be between 2 and 25 characters";

    /**
     *  $usernameCharacters - error message for username
     *   
     *  @var string
     */

    public static $usernameCharacters = "Your username must be between 5 and 25 characters";

    /**
     *  $usernameTaken - error message for username
     *   
     *  @var string
     */

    public static $usernameTaken = "This username already exists";


    /**
     *  $emailsDontMatch - error message for email
     *   
     *  @var string
     */

    public static $emailsDontMatch = "Your emails don't match";

    /**
     *  $emailInvalid - error message for email
     *   
     *  @var string
     */

    public static $emailInvalid = "Your email is invalid";

    /**
     *  $emailTaken - error message for email
     *   
     *  @var string
     */

    public static $emailTaken = "This email already exists";

    /**
     *  $passwordsDontMatch - error message for password
     *   
     *  @var string
     */

    public static $passwordsDontMatch = "Your passwords don't match";

    /**
     *  $passwordLength - error message for password
     *   
     *  @var string
     */

    public static $passwordLength = "Your password must be between 5 and 25 characters";

    /**
     *  $loginFailed - error message for login
     *   
     *  @var string
     */


    public static $loginFailed = "Your username or password was incorrect";


    /**
     * $passwordNotAlphanumeric - error message for password
     * 
     * @var string
     */
    public static $passwordNotAlphanumeric = "Your password can only contain numbers and letters";
}
