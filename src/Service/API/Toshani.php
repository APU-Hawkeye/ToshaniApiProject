<?php
declare(strict_types=1);

namespace App\Service\API;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

/**
 * Class Toshani
 */
class Toshani
{
    public const BASE_URI = 'https://sandbox.toshanibank.com';

    protected string $_secretKey;

    protected ClientInterface $_client;

    /**
     * @param string $secretKey api secret key
     */
    public function __construct(string $secretKey)
    {
        $this->_secretKey = $secretKey;
        $this->_client = new Client();
    }

    /**
     * @param int $mobileNumber mobile number
     * @return \GuzzleHttp\Psr7\Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCustomer(int $mobileNumber)
    {
        $endpoint = self::BASE_URI . '/imps_lite/get_customer';
        $body = [
            'mobileNumber' => $mobileNumber,
        ];
    }
}
