<?php

/**
 *  Get user input values from the form  and store them in a variable
 * 
 */

class GetInputValues
{

    static function getInputValue($name)
    {
        if (isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }
}
