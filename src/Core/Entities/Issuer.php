<?php
namespace Pieterf\LaravelIngIdealAdvanced\Core\Entities;

use InvalidArgumentException;
/**
 * The Issuer class specific to the directoryResponse.
 */
class Issuer
{
    private string $id;
    private string $name;

    /**
     * @param string $id
     * @param string $name
     */
    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
