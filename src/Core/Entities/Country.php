<?php
namespace Pieterf\LaravelIngIdealAdvanced\Core\Entities;

use InvalidArgumentException;

/**
 *  The Country class specific to the directoryResponse.
 */
class Country
{
    private string $countryNames;
    private array $issuers;

    /**
     * @param string $countryNames
     * @param Issuer[] $issuers
     * @throws InvalidArgumentException
     */
    public function __construct(string $countryNames, array $issuers)
    {
        $this->countryNames = $countryNames;
        $this->issuers = $issuers;
    }

    /**
     * @return string
     */
    public function getCountryNames(): string
    {
        return $this->countryNames;
    }

    /**
     * @return Issuer[]
     */
    public function getIssuers(): array
    {
        return $this->issuers;
    }

}
