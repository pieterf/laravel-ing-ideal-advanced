<?php
namespace Pieterf\LaravelIngIdealAdvanced\Core\Entities;

use InvalidArgumentException;

/**
 * The Transaction description as found in the startTransaction request.
 */
class Transaction
{
    private string $purchaseId;
    private float $amount;
    private string $currency;
    private int $expirationPeriod;
    private string $language;
    private string $description;
    private string $entranceCode;

    /**
     * @param float $amount
     * @param string $description
     * @param string $entranceCode
     * @param int $expirationPeriod
     * @param string $purchaseID
     * @param string $currency
     * @param string $language
     * @throws InvalidArgumentException
     */
    function __construct(float $amount, string $description, string $entranceCode, int $expirationPeriod, string $purchaseID, string $currency = 'EUR', string $language = 'nl')
    {
        $this->amount = $amount;
        $this->currency = $currency;
        $this->description = $description;
        $this->entranceCode = $entranceCode;
        $this->expirationPeriod = $expirationPeriod;
        $this->language = $language;
        $this->purchaseId = $purchaseID;
    }

    /**
     * Amount
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Currency
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Entrance code
     * @return string
     */
    public function getEntranceCode(): string
    {
        return $this->entranceCode;
    }

    /**
     * Expiration period
     * @return int
     */
    public function getExpirationPeriod(): int
    {
        return $this->expirationPeriod;
    }

    /**
     * Language
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * Purchase number
     * @return string
     */
    public function getPurchaseId(): string
    {
        return $this->purchaseId;
    }
}
