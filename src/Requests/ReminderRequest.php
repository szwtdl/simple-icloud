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

class ReminderRequest extends AbstractRequest
{
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
        return parent::getData();
    }
}
