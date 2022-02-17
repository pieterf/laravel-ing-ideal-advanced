<?php

namespace Pieterf\LaravelIngIdealAdvanced;

use Pieterf\LaravelIngIdealAdvanced\Core\Entities\Transaction;
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
        return iDEALConnector::getLaravelInstance()
            ->getIssuers();
    }

    public function startTransaction(string $issuerID, Transaction $transaction, $merchantReturnUrl = null): Core\Pieterf\LaravelIngIdealAdvanced\Core\Entities\AcquirerTransactionResponse
    {
        return iDEALConnector::getLaravelInstance()
            ->startTransaction($issuerID, $transaction, $merchantReturnUrl);
    }

    public function getTransaction(string $transactionID) {
        return iDEALConnector::getLaravelInstance()
            ->getTransactionStatus($transactionID);
    }
}
