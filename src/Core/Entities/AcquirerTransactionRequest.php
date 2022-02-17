<?php
namespace Pieterf\LaravelIngIdealAdvanced\Core\Entities;
/**
 *
 */
class AcquirerTransactionRequest extends AbstractRequest
{
    private string $issuerID;
    private Merchant $merchant;
    private Transaction $transaction;

    /**
     * @param string $issuerID
     * @param Merchant $merchant
     * @param Transaction $transaction
     */
    public function __construct(string $issuerID, Merchant $merchant, Transaction $transaction)
    {
        parent::__construct();

        $this->issuerID = $issuerID;
        $this->merchant = $merchant;
        $this->transaction = $transaction;
    }

    /**
     * @return string
     */
    public function getIssuerID(): string
    {
        return $this->issuerID;
    }

    /**
     * @return Merchant
     */
    public function getMerchant(): Merchant
    {
        return $this->merchant;
    }

    /**
     * @return Transaction
     */
    public function getTransaction(): Transaction
    {
        return $this->transaction;
    }
}
