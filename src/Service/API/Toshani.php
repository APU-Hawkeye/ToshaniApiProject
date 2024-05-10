<?php
declare(strict_types=1);

namespace App\Service\API;

use GuzzleHttp\Client;

/**
 * Class Toshani
 */
class Toshani
{
    public const BASE_URI = 'https://sandbox.toshanibank.com';

    protected string $_secretKey;

    protected Client $_client;

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
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCustomer(int $mobileNumber)
    {
        $endpoint = self::BASE_URI . '/imps_lite/get_customer';
        $body = [
            'secret_key' => $this->_secretKey,
            'mobileNumber' => $mobileNumber,
        ];
        $response = $this->_client->post($endpoint, [
            'body' => json_encode($body),
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param int $mobileNumber mobile number
     * @param int $otp otp
     * @param string $name customer name
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function validateOTP(int $mobileNumber, int $otp, string $name): string
    {
        $endpoint = self::BASE_URI . '/imps_lite/verification_otp';
        $body = [
            'secret_key' => $this->_secretKey,
            'mobileNumber' => $mobileNumber,
            'otp' => $otp,
            'name' => $name
        ];
        $response = $this->_client->post($endpoint, [
            'body' => json_encode($body),
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param int $mobileNumber mobile number
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function beneficiaryList(int $mobileNumber)
    {
        $endpoint = self::BASE_URI . '/imps_lite/beneficiary_list';
        $body = [
            'secret_key' => $this->_secretKey,
            'mobileNumber' => $mobileNumber,
        ];
        $response = $this->_client->post($endpoint, [
            'body' => json_encode($body),
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param int $mobileNumber
     * @param string $name
     * @param int $accountNumber
     * @param string $bankCode
     * @param string $ifscCode
     * @param int $beneficiaryMobile
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addBeneficiary(
        int $mobileNumber,
        string $name,
        int $accountNumber,
        string $bankCode,
        string $ifscCode,
        int $beneficiaryMobile
    ) {
        $endpoint = self::BASE_URI . '/imps_lite/add_beneficiary';
        $body = [
            'secret_key' => $this->_secretKey,
            'mobileNumber' => $mobileNumber,
            'name' => $name,
            'accountNumber' => $accountNumber,
            'bankCode' => $bankCode,
            'ifscCode' => $ifscCode,
            'beneficiaryMobileNumber' => $beneficiaryMobile,
        ];
        $response = $this->_client->post($endpoint, [
            'body' => json_encode($body),
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }
}
