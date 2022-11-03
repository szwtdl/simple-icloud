<?php

namespace SimpleIcloud\Requests;

use SimpleIcloud\AbstractRequest;

class AlbumsRequest extends AbstractRequest
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
        //这里可以处理数据
        return parent::getData();
    }
}