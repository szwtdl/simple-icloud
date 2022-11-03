<?php

declare(strict_types=1);
/**
 * This file is part of szwtdl/simple-icloud
 * @link     https://www.szwtdl.cn
 * @contact  szpengjian@gmail.com
 * @license  https://github.com/szwtdl/simple-icloud/blob/master/LICENSE
 */
namespace SimpleIcloud;

abstract class AbstractRequest
{
    protected string $path = 'v2/api/database/retrieve';

    public function getData(): array
    {
        try {
            $result = $this->client->post($this->path, ['json' => $this->params])->getBody()->getContents();
            if (empty($result)) {
                return ['code' => 202, 'msg' => 'empty data', 'data' => []];
            }
            return json_decode($result, true);
        } catch (\Exception $exception) {
            return [
                'code' => 202,
                'msg' => $exception->getMessage(),
                'data' => [],
            ];
        }
    }
}
