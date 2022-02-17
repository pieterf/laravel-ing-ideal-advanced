<?php
namespace Pieterf\LaravelIngIdealAdvanced\Core;

use DOMDocument;


use Pieterf\LaravelIngIdealAdvanced\Core\Configuration\IConnectorConfiguration;
use Pieterf\LaravelIngIdealAdvanced\Core\Configuration\LaravelEnvironmentConfiguration;
use Pieterf\LaravelIngIdealAdvanced\Core\Entities\AcquirerStatusRequest;
use Pieterf\LaravelIngIdealAdvanced\Core\Entities\DirectoryRequest;
use Pieterf\LaravelIngIdealAdvanced\Core\Entities\AcquirerTransactionRequest;
use Pieterf\LaravelIngIdealAdvanced\Core\Entities\Transaction;
use Pieterf\LaravelIngIdealAdvanced\Core\Entities\Merchant;
use Pieterf\LaravelIngIdealAdvanced\Core\Exceptions\iDEALException;
use Pieterf\LaravelIngIdealAdvanced\Core\Exceptions\SecurityException;
use Pieterf\LaravelIngIdealAdvanced\Core\Exceptions\SerializationException;
use Pieterf\LaravelIngIdealAdvanced\Core\Exceptions\ValidationException;
use Pieterf\LaravelIngIdealAdvanced\Core\Http\WebRequest;
use Pieterf\LaravelIngIdealAdvanced\Core\Log\DefaultLog;
use Pieterf\LaravelIngIdealAdvanced\Core\Log\EntityValidator;
use Pieterf\LaravelIngIdealAdvanced\Core\Log\IConnectorLog;
use Pieterf\LaravelIngIdealAdvanced\Core\Xml\XmlSecurity;
use Pieterf\LaravelIngIdealAdvanced\Core\Xml\XmlSerializer;

/**
 *  iDEALConnector Library v2.0
 */
class iDEALConnector
{
    private $serializer;
    private $signer;
    private $validator;
    private $configuration;
    private $log;
    private $merchant;

        /**
     * Constructs an instance of iDEALConnector.
     *
     * @param IConnectorConfiguration $configuration An instance of a implementation of IConnectorConfiguration
     * @param IConnectorLog $log An instance of a implementation of IConnectorLog
     */
    public function __construct(IConnectorConfiguration $configuration, IConnectorLog $log)
    {
        $this->log = $log;
        $this->configuration = $configuration;

        $this->serializer = new XmlSerializer();
        $this->signer = new XmlSecurity();
        $this->validator = new Validation\EntityValidator();

        $this->merchant = new Merchant($this->configuration->getMerchantID(), $this->configuration->getSubID(), $this->configuration->getMerchantReturnURL());
    }

    /**
     * This is a conveninence method to create an instance of iDEALConnector using the default implementations of IConnectorConfiguration and IConnector Log
     * @param string $configurationPath The path of your config.conf file
     * @return iDEALConnector
     */
    public static function getLaravelInstance()
    {
        $config = new LaravelEnvironmentConfiguration();
        return new iDEALConnector($config, new DefaultLog($config->getLogLevel(),$config->getLogFile()));
    }


    /**
     * Get directory listing.
     *
     * @return Pieterf\LaravelIngIdealAdvanced\Core\Entities\DirectoryResponse
     * @throws Exceptions\SerializationException
     * @throws Exceptions\iDEALException
     * @throws Exceptions\ValidationException
     * @throws Exceptions\SecurityException
     */
    public function getIssuers()
    {
        try{
            $request = new DirectoryRequest($this->merchant);

            $this->log->logAPICall("getIssuers()", $request);
            $this->validator->validate($request);

            $response = $this->sendRequest($request, $this->configuration->getAcquirerDirectoryURL());

            $this->validator->validate($response);
            $this->log->logAPIReturn("getIssuers()", $response);

            return $response;
        }
        catch(iDEALException $ex)
        {
            $this->log->logErrorResponse($ex);
            throw $ex;
        }
        catch(ValidationException|SerializationException|SecurityException $ex)
        {
            $this->log->logException($ex);
            throw $ex;
        }
    }

    /**
     * Start a transaction.
     *
     * @param $issuerID
     * @param Pieterf\LaravelIngIdealAdvanced\Core\Entities\Transaction $transaction
     * @param null $merchantReturnUrl
     * @return Pieterf\LaravelIngIdealAdvanced\Core\Entities\AcquirerTransactionResponse
     *@throws Exceptions\iDEALException
     * @throws Exceptions\ValidationException
     * @throws Exceptions\SecurityException
     * @throws Exceptions\SerializationException
     */
    public function startTransaction($issuerID, Transaction $transaction,  $merchantReturnUrl = null)
    {
        try{
            $merchant = $this->merchant;

            if (!is_null($merchantReturnUrl))
                $merchant = new Merchant($this->configuration->getMerchantID(), $this->configuration->getSubID(), $merchantReturnUrl);

            $request = new AcquirerTransactionRequest($issuerID, $merchant, $transaction);

            $this->log->logAPICall("startTransaction()", $request);
            $this->validator->validate($request);

            $response = $this->sendRequest($request, $this->configuration->getAcquirerTransactionURL());

            $this->validator->validate($response);
            $this->log->logAPIReturn("startTransaction()", $response);

            return $response;
        }
        catch(iDEALException $iex)
        {
            $this->log->logErrorResponse($iex);
            throw $iex;
        }
        catch(ValidationException|SerializationException|SecurityException $ex)
        {
            $this->log->logException($ex);
            throw $ex;
        }
    }

    /**
     * Get a transaction status.
     *
     * @param $transactionID
     * @return Pieterf\LaravelIngIdealAdvanced\Core\Entities\AcquirerStatusResponse
     *@throws Exceptions\iDEALException
     * @throws Exceptions\ValidationException
     * @throws Exceptions\SecurityException
     * @throws Exceptions\SerializationException
     */
    public function getTransactionStatus($transactionID)
    {
        try{
            $request = new AcquirerStatusRequest($this->merchant, $transactionID);

            $this->log->logAPICall("startTransaction()", $request);
            $this->validator->validate($request);

            $response = $this->sendRequest($request, $this->configuration->getAcquirerStatusURL());

            $this->validator->validate($response);
            $this->log->logAPIReturn("startTransaction()", $response);

            return $response;
        }
        catch(iDEALException $iex)
        {
            $this->log->logErrorResponse($iex);
            throw $iex;
        }
        catch(ValidationException $ex)
        {
            $this->log->logException($ex);
            throw $ex;
        }
        catch(SerializationException $ex)
        {
            $this->log->logException($ex);
            throw $ex;
        }
        catch(SecurityException $ex)
        {
            $this->log->logException($ex);
            throw $ex;
        }
    }

    /*
     * Returns the assigned configuration.
     */
    public function getConfiguration() {
        return $this->configuration;
    }

    private function sendRequest($request, $url)
    {
        $xml = $this->serializer->serialize($request);

        $this->signer->sign(
            $xml,
            $this->configuration->getCertificatePath(),
            $this->configuration->getPrivateKeyPath(),
            $this->configuration->getPassphrase()
        );

        $request = $xml->saveXML();

        $this->log->logRequest($request);

        if(!is_null($this->configuration->getProxy()))
            $response = WebRequest::post($url, $request, $this->configuration->getProxy());
        else
            $response = WebRequest::post($url, $request);

        $this->log->logResponse($response);

        if(empty($response))
          throw new SerializationException('Response was empty');

        $doc = new DOMDocument('1.0', 'utf-8');
        $doc->loadXML($response);


        $verified = $this->signer->verify($doc, $this->configuration->getAcquirerCertificatePath());

        if (!$verified)
            throw new SecurityException('Response message signature check fails.');

        return $this->serializer->deserialize($doc);
    }
}

