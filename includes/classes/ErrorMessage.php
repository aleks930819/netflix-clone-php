<?php

/**
 *  Create an error message
 *  
 */
class ErrorMessage

{
    /**
     *  Show the error message
     * 
     *  @param $message - string
     * 
     *  @return string - html
     */
    public static function show($message): string
    {
        //TODO - fix the style of the error message

        exit("<div class='error_banner'>
                    <h2>$message</h2>
                </div>");
    }
}
