<?php
namespace Pieterf\LaravelIngIdealAdvanced\Core\Entities;

use DateTime;

/**
 * The abstract used for all response objects.
 */
class AbstractResponse
{
    private DateTime $createDateTimestamp;

    /**
     * @param DateTime $createDateTimestamp
     */
    function __construct(DateTime $createDateTimestamp)
    {
        $this->createDateTimestamp = $createDateTimestamp;
    }

    /**
     * @return DateTime
     */
    public function getCreateDateTimestamp(): DateTime
    {
        return $this->createDateTimestamp;
    }

}
