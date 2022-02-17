<?php
namespace Pieterf\LaravelIngIdealAdvanced\Core\Exceptions;


/**
 *  This exception occurs during validation of entities.
 */
class ValidationException extends ConnectorException
{
    function __construct($message)
    {
        parent::__construct($message);
    }
}
