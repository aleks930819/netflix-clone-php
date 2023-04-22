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
