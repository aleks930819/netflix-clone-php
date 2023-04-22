<?php



/** 
 *  This class is used to account data
 *  
 */
class Account
{

    /**
     *  $conn - connection to the database
     * 
     * @var PDO
     */
    private $conn;

    /**
     *  $errorArray - array of errors
     * 
     * @var array
     */
    private $errorArray = [];

    /**
     *  $firstName - first name of the user
     * 
     * @var string
     */


    /**
     *  Constructor for the Account class
     * 
     * @param PDO $conn
     * 
     * @return void
     */

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    /**
     *  Validate first name
     * 
     * @param string $firstName
     * 
     * @return void
     */



    private function validateFirstName(string $firstName): void
    {
        if (strlen($firstName) > 25 || strlen($firstName) < 2) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
            return;
        }
    }

    /**
     *  Validate last name
     * 
     * @param string $lastName
     * 
     * @return void
     */

    private function validateLastName(string $lastName): void
    {
        if (strlen($lastName) > 25 || strlen($lastName) < 2) {
            array_push($this->errorArray, Constants::$lastNameCharacters);
            return;
        }
    }

    /**
     *  Validate  username
     * 
     * @param string $userame
     * 
     * @return void
     */

    private function validateUsername(string $username): void
    {
        if (strlen($username) > 25 || strlen($username) < 2) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }

        $query = $this->conn->prepare("SELECT * FROM user WHERE user_name = :username");
        $query->bindValue(":username", $username);
        $query->execute();

        if ($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::$usernameTaken);
        }
    }

    /**
     *  Validate emails
     * 
     * @param string $email
     * @param string $confirmEmail
     * 
     * @return void
     */

    private function validateEmails(string $email, string $confirmEmail): void
    {
        if ($email != $confirmEmail) {
            array_push($this->errorArray, Constants::$emailsDontMatch);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        $query = $this->conn->prepare("SELECT * FROM user WHERE email=:email");
        $query->bindValue(":email", $email);

        $query->execute();

        if ($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
        }
    }

    /**
     *  Validate passwords
     * 
     * @param string $password
     * @param string $confirmPassword
     * 
     * @return void
     */


    private function validatePasswords(string $password, string $confirmPassword): void
    {
        if ($password != $confirmPassword) {
            array_push($this->errorArray, Constants::$passwordsDontMatch);
            return;
        }

        if (strlen($password) < 5 || strlen($password) > 25) {
            array_push($this->errorArray, Constants::$passwordLength);
            return;
        }

        if (preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
            return;
        }
    }


    /**
     *  Check if there are any errors in the error array
     * 
     * @param string $err
     * 
     * @return array
     */

    public function getError($err): string
    {
        if (in_array($err, $this->errorArray)) {
            return "<span class='error_message'>$err</span>";
        }
        return '';
    }

    /**
     *  Register user to the database
     * 
     * @param string $firstName
     * @param string $lastName
     * @param string $username
     * @param string $email
     * @param string $confirmEmail
     * @param string $password
     * @param string $confirmPassword
     * 
     * @return bool
     */


    public function register(string $firstName, string $lastName, string $username, string $email, string $confirmEmail, string $password, string $confirmPassword): bool
    {
        $this->validateFirstName($firstName);
        $this->validateLastName($lastName);
        $this->validateUsername($username);
        $this->validateEmails($email, $confirmEmail);
        $this->validatePasswords($password, $confirmPassword);

        if (empty($this->errorArray)) {
            return $this->insertUserDetails($firstName,  $lastName,  $username, $email, $password);
        }

        return false;
    }

    /**
     *  Insert user details to the database
     * 
     * @param string $firstName
     * @param string $lastName
     * @param string $username
     * @param string $email
     * @param string $password
     * 
     * @return bool
     */

    private function insertUserDetails(string $firstName, string $lastName, string $username, string $email, string $password): bool
    {
        $password = hash("sha512", $password);
        $profilePic = "assets/images/profile-pics/head_emerald.png";
        $date = date("Y-m-d");

        $query = $this->conn->prepare("INSERT INTO user (first_name, last_name, user_name, email, password, sign_up_date) VALUES (:firstName, :lastName, :username, :email, :password, :date)");
        $query->bindValue(":firstName", $firstName);
        $query->bindValue(":lastName", $lastName);
        $query->bindValue(":username", $username);
        $query->bindValue(":email", $email);
        $query->bindValue(":password", $password);
        $query->bindValue(":date", $date);

        return $query->execute();
    }
}
