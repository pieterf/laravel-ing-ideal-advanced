<?php
namespace Pieterf\LaravelIngIdealAdvanced\Core\Entities;

use InvalidArgumentException;
use DateTime;

/**
 * The DirectoryResponse object received from the directory request call.
 */
class DirectoryResponse extends AbstractResponse
{
    private DateTime $directoryDate;
    private string $acquirerID;
    private array $countries;

    /**
     * @param DateTime $date
     * @param DateTime $directoryDate
     * @param string $acquirerID
     * @param Country[] $countries
     * @throws InvalidArgumentException
     */
    public function __construct(DateTime $date, DateTime $directoryDate, string $acquirerID, array $countries)
    {
        parent::__construct($date);

        $this->directoryDate = $directoryDate;
        $this->acquirerID = $acquirerID;
        $this->countries = $countries;
    }

    /**
     * @return string
     */
    public function getAcquirerID(): string
    {
        return $this->acquirerID;
    }

    /**
     * @return Country[]
     */
    public function getCountries(): array
    {
        return $this->countries;
    }

    /**
     * @return DateTime
     */
    public function getDirectoryDate(): DateTime
    {
        return $this->directoryDate;
    }

}
