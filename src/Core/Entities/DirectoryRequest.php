<?php
namespace Pieterf\LaravelIngIdealAdvanced\Core\Entities;

/**
 * The DirectoryRequest object used for the directory request call.
 */
class DirectoryRequest extends AbstractRequest
{
    private Merchant $merchant;

    /**
     * @param Merchant $merchant
     */
    public function __construct(Merchant $merchant)
    {
        parent::__construct();
        $this->merchant = $merchant;
    }

    /**
     * @return Merchant
     */
    public function getMerchant(): Merchant
    {
        return $this->merchant;
    }
}
