<?php
namespace Pieterf\LaravelIngIdealAdvanced\Core\Log;

use Pieterf\LaravelIngIdealAdvanced\Core\Entities\AbstractResponse;
use Pieterf\LaravelIngIdealAdvanced\Core\Entities\AbstractRequest;
use Illuminate\Support\Facades\Log;
use Pieterf\LaravelIngIdealAdvanced\Core\Exceptions\ConnectorException;
use Pieterf\LaravelIngIdealAdvanced\Core\Exceptions\iDEALException;

class DefaultLog implements IConnectorLog
{
    private $logPath;
    private $logLevel;

    function __construct($logLevel, $logPath)
    {
        $this->logLevel = $logLevel;
        $this->logPath = $logPath;
    }

    public function logAPICall($method, AbstractRequest $request)
    {
        if ($this->logLevel === 0)
            $this->log("Entering[".$method."]", $request);
    }

    public function logAPIReturn($method, AbstractResponse $response)
    {
        if ($this->logLevel === 0)
            $this->log("Exiting[".$method."]", $response);
    }

    public function logRequest($xml)
    {
        if ($this->logLevel === 0)
            $this->log("Request", $xml);
    }

    public function logResponse($xml)
    {
        if ($this->logLevel === 0)
            $this->log("Response", $xml);
    }

    public function logErrorResponse(iDEALException $exception)
    {
        $this->log("ErrorResponse", $exception);
    }

    public function logException(ConnectorException $exception)
    {
        $this->log("Exception", $exception);
    }

    private function log($message, $value)
    {
        Log::error($message."\n".$value."\n\n");
    }
}
