<?php

namespace Pieterf\LaravelIngIdealAdvanced\Core\Configuration;

use Pieterf\LaravelIngIdealAdvanced\Core\Log\LogLevel;

/**
 *
 */
class LaravelEnvironmentConfiguration implements IConnectorConfiguration
{
    private $certificate = null;//"";
    private $privateKey = null;//"";
    private $passphrase = null;//"";

    private $acquirerCertificate = null;//"";

    private $merchantID = null;//"";
    private $subID = null;//0;
    private $subIDString = null;//0;
    private $returnURL = null;//"";

    private $expirationPeriod = null;//60;
    private $expirationPeriodString = null;//
    private $acquirerDirectoryURL = null;//"";
    private $acquirerTransactionURL = null;//"";
    private $acquirerStatusURL = null;//"";
    private $timeout = null;//10;
    private $timeoutString = null;//10;

    private $proxy = null;
    private $proxyUrl = null;//"";

    private $logFile = null;//"logs/connector.log";
    private $logLevel = null;//LogLevel::Error;
    private $logLevelString = null;//LogLevel::Error;

    function __construct()
    {
        $this->loadFromEnv();
    }

    private function loadFromEnv()
    {
        $this->merchantID = config('ing-ideal-advanced.merchant_id');

        $this->returnURL = null;

        $this->acquirerDirectoryURL = config('ing-ideal-advanced.acquirer_url');
        $this->acquirerStatusURL = config('ing-ideal-advanced.acquirer_url');
        $this->acquirerTransactionURL = config('ing-ideal-advanced.acquirer_url');

        $this->expirationPeriod = config('ing-ideal-advanced.expiration_period');

        $this->acquirerCertificate = config('ing-ideal-advanced.acquirer_certificate');
        $this->certificate = config('ing-ideal-advanced.certificate');
        $this->privateKey = config('ing-ideal-advanced.private_key');

        $this->passphrase = config('ing-ideal-advanced.passphrase');

        $this->proxy = '';

        $this->proxyUrl = '';


        $this->timeout = 0;

        $this->subID = 0;

        $this->logLevel = LogLevel::Error;
        $this->logFile = null;
    }

    public function getAcquirerCertificatePath()
    {
        return $this->acquirerCertificate;
    }

    public function getCertificatePath()
    {
        return $this->certificate;
    }

    public function getExpirationPeriod()
    {
        return $this->expirationPeriod;
    }

    public function getMerchantID()
    {
        return $this->merchantID;
    }

    public function getPassphrase()
    {
        return $this->passphrase;
    }

    public function getPrivateKeyPath()
    {
        return $this->privateKey;
    }

    public function getMerchantReturnURL()
    {
        return $this->returnURL;
    }

    public function getSubID()
    {
        return $this->subID;
    }

    public function getAcquirerTimeout()
    {
        return $this->timeout;
    }

    public function getAcquirerDirectoryURL()
    {
        return $this->acquirerDirectoryURL;
    }

    public function getAcquirerStatusURL()
    {
        return $this->acquirerStatusURL;
    }

    public function getAcquirerTransactionURL()
    {
        return $this->acquirerTransactionURL;
    }


    /**
     * @return string
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * @return string
     */
    public function getProxyUrl()
    {
        return $this->proxyUrl;
    }

    /**
     * @return string
     */
    public function getLogFile()
    {
        return $this->logFile;
    }

    /**
     * @return int
     */
    public function getLogLevel()
    {
        return $this->logLevel;
    }
}
