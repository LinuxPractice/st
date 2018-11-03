<?php
namespace traits;

/**
 * Create a custom error object to return when a type hint return type is an object
 *
 * @author Bill
 *        
 */
trait CustomErrorObject {

    function createErrorObject($message)
    {
        return (object) array(
            'error' => $message
        );
    }
}