<?php

/**
 *  This class is used to get user input values from the form
 * 
 */

class GetInputValues
{

    /**
     *  Get user input values from the form  and store them in a variable
     * 
     * @param $name
     * 
     * @return void
     * 
     */

    static function getInputValue($name): void
    {
        if (isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }
}
