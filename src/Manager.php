<?php

namespace Pieterf\LaravelIngIdealAdvanced;

use Pieterf\LaravelIngIdealAdvanced\Core\Entities\AcquirerStatusResponse;
use Pieterf\LaravelIngIdealAdvanced\Core\Entities\AcquirerTransactionResponse;
use Pieterf\LaravelIngIdealAdvanced\Core\Entities\DirectoryResponse;
use Pieterf\LaravelIngIdealAdvanced\Core\Entities\Transaction;
use Pieterf\LaravelIngIdealAdvanced\Core\iDEALConnector;

class Manager
{
    /**
     * @throws Core\Exceptions\ValidationException
     * @throws Core\Exceptions\iDEALException
     * @throws Core\Exceptions\SerializationException
     * @throws Core\Exceptions\SecurityException
     */
    public function getIssuers(): DirectoryResponse
    {
        return iDEALConnector::getLaravelInstance()
            ->getIssuers();
    }

    /**
     * @param string $issuerID
     * @param Transaction $transaction
     * @param null $merchantReturnUrl
     * @return AcquirerTransactionResponse
     * @throws Core\Exceptions\SecurityException
     * @throws Core\Exceptions\SerializationException
     * @throws Core\Exceptions\ValidationException
     * @throws Core\Exceptions\iDEALException
     */
    public function startTransaction(string $issuerID, Transaction $transaction, $merchantReturnUrl = null): AcquirerTransactionResponse
    {
        return iDEALConnector::getLaravelInstance()
            ->startTransaction($issuerID, $transaction, $merchantReturnUrl);
    }

    /**
     * @throws Core\Exceptions\ValidationException
     * @throws Core\Exceptions\iDEALException
     * @throws Core\Exceptions\SerializationException
     * @throws Core\Exceptions\SecurityException
     */
    public function getTransaction(string $transactionID): AcquirerStatusResponse
    {
        return iDEALConnector::getLaravelInstance()
            ->getTransactionStatus($transactionID);
    }
}
