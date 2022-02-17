<?php

namespace Pieterf\LaravelIngIdealAdvanced;

use Pieterf\LaravelIngIdealAdvanced\Core\iDEALConnector;

class LaravelIngIdealAdvanced
{
    /**
     * @throws Core\Exceptions\ValidationException
     * @throws Core\Exceptions\iDEALException
     * @throws Core\Exceptions\SerializationException
     * @throws Core\Exceptions\SecurityException
     */
    public function getIssuers() {
        return iDEALConnector::getLaravelInstance()->getIssuers();
    }
}
