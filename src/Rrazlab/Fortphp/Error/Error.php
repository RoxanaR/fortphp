<?php
namespace Rrazlab\Fortphp\Error;

class Error {

    /**
     * Trigger php error based on code
     * @var string $code - error code
     */
    public static trigger($code = '')
    {
        switch ($code) {
            case 100:
                $message = "Config routes not defined!";
                break;

            default:
                $message = "Error!";
                break;
        }
        trigger_error("Error code: $code - $message", E_USER_ERROR);
    }

}
