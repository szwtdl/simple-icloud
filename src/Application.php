<?php

namespace SimpleIcloud;


use GuzzleHttp\Client;

/**
 * @method login($params = []): array     //登录账号
 * @method phones($params = []): array    //绑定手机列表
 * @method verify($params = []): array    //验证接口
 * @method reset($params = []): array     //重置账号
 * @method accounts($params = []): array  //账号的设备
 * @method download($params = []): array  //下载数据
 * @method contact($params = []): array   //通讯录
 * @method location($params = []): array  //定位列表
 * @method calendar($params =[]): array   //日历列表
 * @method events($params = []): array    //事件记录
 * @method albums($params = []): array    //相册列表
 * @method files($params = []): array     //文件列表
 * @method notes($params = []): array     //备忘录列表
 * @method reminders($params = []): array //reminders列表
 * @method reminder($params = []): array  //reminder详情
 * @method devices($params = []): array   //设备列表
 * @method messages($params = []): array  //收件箱
 * @method message($params = []): array   //收件箱详情
 */
class Application
{
    protected Client $client;
    protected array $options = [
        'base_uri' => 'http://localhost:8080',
        'timeout' => '5.0'
    ];

    public function __construct(array $options = [])
    {
        $this->client = new Client(array_merge($this->options, $options));
    }

    public function __call($name, $arguments)
    {
        $className = "SimpleIcloud\\Requests\\" . $name . "Request";
        if (!class_exists($className)) {
            return [
                'code' => 202,
                'msg' => "Error ClassName " . $name . "Request not ",
                'data' => []
            ];
        }
        return (new $className($this->client, array_shift($arguments)))->getData();
    }

}