<?php
namespace Pieterf\LaravelIngIdealAdvanced\Core\Entities;
use DateTime;
use InvalidArgumentException;

/**
 *
 */
class AcquirerTransactionResponse extends AbstractResponse
{
    private string $acquirerID;
    private string $issuerAuthenticationURL;

    private string $transactionID;
    private DateTime $transactionTimestamp;
    private string $purchaseID;

    /**
     * @param string $acquirerID
     * @param string $issuerAuthenticationURL
     * @param string $purchaseID
     * @param string $transactionID
     * @param DateTime $transactionTimestamp
     * @param DateTime $createdTimestamp
     * @throws InvalidArgumentException
     */
    function __construct(string $acquirerID, string $issuerAuthenticationURL, string $purchaseID, string $transactionID, DateTime $transactionTimestamp, DateTime $createdTimestamp)
    {
        parent::__construct($createdTimestamp);

        $this->acquirerID = $acquirerID;
        $this->issuerAuthenticationURL = $issuerAuthenticationURL;
        $this->purchaseID = $purchaseID;
        $this->transactionID = $transactionID;
        $this->transactionTimestamp = $transactionTimestamp;
    }

    /**
     * @return string
     */
    public function getPurchaseID(): string
    {
        return $this->purchaseID;
    }

    /**
     * @return string
     */
    public function getTransactionID(): string
    {
        return $this->transactionID;
    }

    /**
     * @return DateTime
     */
    public function getTransactionTimestamp(): DateTime
    {
        return $this->transactionTimestamp;
    }

    /**
     * @return string
     */
    public function getAcquirerID(): string
    {
        return $this->acquirerID;
    }

    /**
     * @return string
     */
    public function getIssuerAuthenticationURL(): string
    {
        return $this->issuerAuthenticationURL;
    }


}
