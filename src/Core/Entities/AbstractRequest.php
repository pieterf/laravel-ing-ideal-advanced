<?php
namespace Pieterf\LaravelIngIdealAdvanced\Core\Entities;

use DateTime;

/**
 * The abstract used for all request objects.
 */
abstract class AbstractRequest
{
    private DateTime $createDateTimestamp;

    /**
     *
     */
    function __construct()
    {
        $this->createDateTimestamp = new DateTime();
    }

    /**
     * @return DateTime
     */
    public function getCreateDateTimestamp(): DateTime
    {
        return $this->createDateTimestamp;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return "3.3.1";
    }
}
