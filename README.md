<h2 align="center">NewX Console</h2>

## 安装说明
使用composer一键安装
```
composer require beansir/newx-console
```

## 搭建结构
* console // 控制台目录
    * config
        * config.php
        * function.php
    * Home.php
* command // 脚本执行文件

#### 创建脚本执行文件command
```php
#!/usr/bin/env php
<?php
defined('PROJECT_PATH') or define('PROJECT_PATH', __DIR__);
 
require PROJECT_PATH . '/vendor/beansir/newx-console/command';
```

#### 配置文件
console/config/config.php
```php
<?php
return [
    'app' => [
        'timezone' => 'Asia/Shanghai', // 时区
    ],
    'database' => [
        'default' => [
            'host'      => '127.0.0.1',
            'user'      => 'user',
            'password'  => 'password',
            'db'        => 'db',
            'type'      => 'mysqli'
        ],
    ],
];
```

#### 运行脚本
```
command home/index param1 param2 ...
```