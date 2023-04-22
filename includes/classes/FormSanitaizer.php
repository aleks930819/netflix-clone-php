<?php

/*
 * This class is used to sanitize form data
 * 
 * 
 */
class FormSanitaizer

{
    /**
     *  Sanitizes form string
     * 
     * @param $inputText
     * 
     * @return string
     *  */

    public static function sanitzaFormString(string $inputText): string
    {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        $inputText = strtolower($inputText);
        $inputText = ucfirst($inputText);
        return $inputText;
    }

    /**
     *  Sanitizes form username
     * 
     * @param $inputText
     * 
     * @return string
     *  */

    public static function sanitzaFormUsername(string $inputText): string
    {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        return $inputText;
    }

    /**
     *  Sanitizes form password
     * 
     * @param $inputText
     * 
     * @return string
     *  */

    public static function sanitzaFormPassword(string $inputText): string
    {
        $inputText = strip_tags($inputText);
        // $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
        // if (preg_match($password_regex, $password)) {
        //     return $inputText;
        // } else {
        //     return "Password must contain at least 8 characters, 1 uppercase letter, 1 lowercase letter, 1 number and 1 special character";
        // }
        return $inputText;
    }

    /**
     *  Sanitizes form email
     * 
     * @param $inputText
     * 
     * @return string
     *  */

    public static function sanitzaFormEmail(string $inputText): string
    {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        return $inputText;
    }
}
