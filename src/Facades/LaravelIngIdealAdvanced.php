<?php

namespace Pieterf\LaravelIngIdealAdvanced\Facades;

use Illuminate\Support\Facades\Facade;
use Pieterf\LaravelIngIdealAdvanced\Core\Entities\AcquirerStatusResponse;
use Pieterf\LaravelIngIdealAdvanced\Core\Entities\AcquirerTransactionResponse;
use Pieterf\LaravelIngIdealAdvanced\Core\Entities\DirectoryResponse;
use Pieterf\LaravelIngIdealAdvanced\Core\Entities\Transaction;
use Pieterf\LaravelIngIdealAdvanced\Manager;

/**
 * @see \Pieterf\LaravelIngIdealAdvanced\LaravelIngIdealAdvanced
 *
 * @method static DirectoryResponse getIssuers()
 * @method static AcquirerTransactionResponse startTransaction(string $issuerID, Transaction $transaction, $merchantReturnUrl = null)
 * @method static AcquirerStatusResponse getTransaction(string $transactionID)
 */
class LaravelIngIdealAdvanced extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Manager::class;
    }
}
