<?php
namespace Pieterf\LaravelIngIdealAdvanced\Core\Entities;

/**
 *
 */
class AcquirerStatusRequest extends AbstractRequest
{
    private Merchant $merchant;
    private string $transactionID;

    /**
     * @param Merchant $merchant
     * @param string $transactionID
     */
    public function __construct(Merchant $merchant, string $transactionID)
    {
        parent::__construct();

        $this->merchant = $merchant;
        $this->transactionID = $transactionID;
    }

    /**
     * @return Merchant
     */
    public function getMerchant(): Merchant
    {
        return $this->merchant;
    }

    /**
     * @return string
     */
    public function getTransactionID(): string
    {
        return $this->transactionID;
    }
}
