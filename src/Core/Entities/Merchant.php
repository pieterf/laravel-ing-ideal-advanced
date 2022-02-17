<?php
namespace Pieterf\LaravelIngIdealAdvanced\Core\Entities;

use InvalidArgumentException;
/**
 *  The Merchant description.
 */
class Merchant
{
    private string $merchantID;
    private int $subID;
    private string $merchantReturnURL;

    /**
     * @param string $merchantID
     * @param int $subID
     * @param string $merchantReturnURL
     */
    public function __construct(string $merchantID, int $subID, string $merchantReturnURL)
    {
        $this->merchantID = $merchantID;
        $this->merchantReturnURL = $merchantReturnURL;
        $this->subID = $subID;
    }

    /**
     * @return string
     */
    public function getMerchantID(): string
    {
        return $this->merchantID;
    }

    /**
     * @return int
     */
    public function getSubID(): int
    {
        return $this->subID;
    }

    /**
     * @return string
     */
    public function getMerchantReturnURL(): string
    {
        return $this->merchantReturnURL;
    }
}
