<?php
namespace Pieterf\LaravelIngIdealAdvanced\Core\Entities;

use InvalidArgumentException;
use DateTime;

/**
 *
 */
class AcquirerStatusResponse extends AbstractResponse
{
    private string $acquirerID;
    private string $transactionID;
    private string $status;
    private DateTime $statusTimestamp;
    private ?string $consumerName;
    private ?string $consumerIBAN;
    private ?string $consumerBIC;
    private ?float $amount;
    private ?string $currency;

    /**
     * @param string $acquirerID
     * @param float $amount
     * @param string $consumerBIC
     * @param string $consumerIBAN
     * @param string $consumerName
     * @param DateTime $createdTimestamp
     * @param string $currency
     * @param string $status
     * @param DateTime $statusTimestamp
     * @param string $transactionID
     */
    function __construct(string $acquirerID, ?float $amount, ?string $consumerBIC, ?string $consumerIBAN, ?string $consumerName, DateTime $createdTimestamp, ?string $currency, string $status, DateTime $statusTimestamp, string $transactionID)
    {
        parent::__construct($createdTimestamp);

        $this->acquirerID = $acquirerID;
        $this->amount = $amount;
        $this->consumerBIC = $consumerBIC;
        $this->consumerIBAN = $consumerIBAN;
        $this->consumerName = $consumerName;
        $this->currency = $currency;
        $this->status = $status;
        $this->statusTimestamp = $statusTimestamp;
        $this->transactionID = $transactionID;
    }

    /**
     * @return string
     */
    public function getAcquirerID(): string
    {
        return $this->acquirerID;
    }

    /**
     * @return float
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getConsumerBIC(): ?string
    {
        return $this->consumerBIC;
    }

    /**
     * @return string
     */
    public function getConsumerIBAN(): ?string
    {
        return $this->consumerIBAN;
    }

    /**
     * @return string
     */
    public function getConsumerName(): ?string
    {
        return $this->consumerName;
    }

    /**
     * @return string
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return DateTime
     */
    public function getStatusTimestamp(): DateTime
    {
        return $this->statusTimestamp;
    }

    /**
     * @return string
     */
    public function getTransactionID(): string
    {
        return $this->transactionID;
    }


}
