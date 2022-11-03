### Apple icloud sdk

[![Build Status](https://github.com/szwtdl/icloud/actions/workflows/test.yml/badge.svg)](https://github.com/szwtdl/icloud/actions)
[![Latest Stable Version](https://poser.pugx.org/szwtdl/icloud/v/stable)](https://packagist.org/packages/szwtdl/icloud)
[![Total Downloads](https://poser.pugx.org/szwtdl/icloud/downloads)](https://packagist.org/packages/szwtdl/icloud)
[![Latest Unstable Version](https://poser.pugx.org/szwtdl/icloud/v/unstable)](https://packagist.org/packages/szwtdl/icloud)
[![License](https://poser.pugx.org/szwtdl/icloud/license)](https://packagist.org/packages/szwtdl/icloud)
[![Monthly Downloads](https://poser.pugx.org/szwtdl/icloud/d/monthly)](https://packagist.org/packages/szwtdl/icloud)

### 安装

```bash
  composer require szwtdl/simple-icloud
```

#### 初始化

```php 
require_once __DIR__ . '/vendor/autoload.php';
$app = new SimpleIcloud\Application([
    'base_uri' => 'http://localhost:8080',
    'timeout' => '5.0'
]);

```

### 使用接口 `这里写一个示例，其他的接口一样使用就可以了`

```php 
// 登录接口    
$result = $app->login([
    'username' => 'demo@gmail.com',
    'password' => '12345678',
    'verifyType' => 'sms', // 短信登录
    'deviceid' => 'device_id' // 设备ID
]);
```

### laravel 集成

```php 

```

### 二次开发 `Requests\WhatsappRequest`

```php 
<?php

namespace SimpleIcloud\Requests;

class WhatsappRequest
{
    protected string $path = 'v2/api/auth/reset'; //请求路径
    protected array $params = [];                 //请求参数
    protected $client;                            //这里是具体请求类  

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

```

### 集成测试

    本地集成composer 记得添加仓库地址，未本地，第一次发包，记得改用原仓库，否则调试不方便

```bash 
composer config repositories.simple-icloud path ../simple-icloud // 引入本地仓库
composer require szwtdl/simple-icloud
// 生成配置文件 `两个是相同的结果`
php artisan vendor:publish --provider="SimpleIcloud\ServiceProvider"
php artisan vendor:publish --tag=icloud  
// 如果不知道可以 php artisan vendor:publish 可以列出当前的可用户的包
```

### 项目说明

- [x] icloud 账号登录
- [x] 通讯录
- [x] 相册列表
- [x] 文件列表
- [x] 备忘录
- [x] 短信列表
- [x] 定位记录
- [x] 事件记录
- [x] 便签记录~~
