<?php

declare(strict_types=1);
/**
 * This file is part of szwtdl/simple-icloud
 * @link     https://www.szwtdl.cn
 * @contact  szpengjian@gmail.com
 * @license  https://github.com/szwtdl/simple-icloud/blob/master/LICENSE
 */
namespace SimpleIcloud\Requests;

use SimpleIcloud\AbstractRequest;

class PhonesRequest extends AbstractRequest
{
    protected string $path = 'v2/api/auth/authinfo';

    protected array $params = [];

    protected $client;

    public function __construct($client, $params = [])
    {
        $this->client = $client;
        $this->params = $params;
    }

    public function getData(): array
    {
        // 这里可以处理数据
        $result = parent::getData();
        $data = [
            'device_type' => false,
            'phone' => [],
            'phones' => [],
        ];
        if (isset($result['direct'])) {
            $array = $result['direct']['twoSV']['phoneNumberVerification']['trustedPhoneNumbers'];
            $trustedPhoneNumber = $result['direct']['twoSV']['phoneNumberVerification']['trustedPhoneNumber'];
            $data['device_type'] = $result['direct']['hasTrustedDevices'] === true ? 'none' : 'sms';
            $data['phone'] = [
                'id' => $trustedPhoneNumber['id'],
                'phone' => $trustedPhoneNumber['numberWithDialCode'],
                'last' => $trustedPhoneNumber['lastTwoDigits'],
            ];
            foreach ($array as $item) {
                $data['phones'][] = [
                    'id' => $item['id'] ?? '',
                    'phone' => $item['numberWithDialCode'] ?? '',
                    'last' => $item['lastTwoDigits'] ?? '',
                ];
            }
        }
        return $data;
    }
}
